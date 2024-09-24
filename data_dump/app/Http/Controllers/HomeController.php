<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use PHPHtmlParser\Dom;
use App\Models\UserSession;
use App\Models\User;
use App\Models\Receipt;
use App\Models\Reports;
use App\Models\Setting;
use App\Models\Webhook;
use App\Models\CoinremitterWallet;
use App\Models\BankAccounts;
use PDF;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendReport;

require("coinremitterAPI/autoload.php");

use CoinRemitter\CoinRemitter;
use DOMDocument;
use DOMXPath;
use Session;

require('authorize-lib/autoload.php');

use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

class HomeController extends Controller
{
    /* public function generatePayTabsMakePayment(Request $request)
    {
        dd($request);
    }*/


    public function find_invoice(){
        return view('invoice_user');
    }
    public function find_invoice_post(Request $request){
           if($request->email!=""){
                 $user  =  User::where('email',$request->email)->first();
                if($user){
                    $report = Reports::where('user_id', $user->id)->first();
                    if(!is_null($report)){
                        return redirect()->to('/reports/'.$report->report_id);
                    }
                    else
                    {
                        Session(["error" => "Report is not found! kindly check again."]);
                        return redirect()->route('find_invoice');
                    }
                }else{
                     Session(["error" => "Report is not found! kindly check again."]);
                        return redirect()->route('find_invoice');
                }
            }elseif($request->vin !=""){
                    $report = Reports::where('vin',$request->vin)->first();
                    if(!is_null($report)){
                        return redirect()->to('/reports/'.$report->report_id);
                    }else
                    {
                        Session(["error" => "Report is not found! kindly check again."]);
                        return redirect()->route('find_invoice');
                    }
            }else{
                Session(["error" => "Kindly fill input"]);
                return redirect()->route('find_invoice');
            }
    }
    public function chargeFromPaytabsCard(Request $request)
    {
        if (auth()->check()) {
            $userid = auth()->user()->id;
        } else {
            $userid =  $this->checkUser(request()->data['email']);
        }

        $user = User::find($userid);

        $settings = Setting::first();

        $random_number = mt_rand();

        if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
        {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
        {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        $payment_token = $request->payment_token;


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://secure.paytabs.com/payment/request',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
                "profile_id": ' . $settings->paytabs_profile_id . ',
                "tran_type": "sale",
                "tran_class": "ecom",
                "cart_description": "Payment for PCEAT-' . $random_number . '",
                "cart_id": "PCEAT-' . $random_number . '",
                "cart_currency": "' . $settings->paytabs_currency . '",
                "cart_amount": ' . $request->price . ',
                "payment_token": "' . $payment_token . '",
                "return" : "https://www.eliteglobalcheck.com/paytabs_hosted_return_url/eliteglobalcheck-' . $random_number . '",
                "customer_details": {
                "name": "' . $user->name . '",
                "email": "' . $user->email . '",
                "street1": "404, 11th st, void",
                "city": "Dubai",
                "state": "DU",
                "country": "AE",
                "ip": "' . $ip . '"
                }
            }',
            CURLOPT_HTTPHEADER => array(
                'authorization: ' . $settings->paytabs_authorization_key,
                'Content-Type: text/plain'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $response = json_decode($response);

        if (isset($response->payment_result)) {
            return response()->json(['error' => $response->payment_result->response_message]);
        } else {


            $receipt = new Receipt;
            $receipt->user_id          = $userid;
            $receipt->payment_method   = 'Paytabs';
            $receipt->transaction_id   = $response->tran_ref;
            $receipt->paytabs_order_id = "eliteglobalcheck-" . $random_number;
            $receipt->currency_code    = $settings->paytabs_currency;
            $receipt->amount           = $request->price;
            $receipt->payment_status   = "Pending";
            $receipt->package          = request()->package;
            $receipt->vin              = request()->data['vin'];
            $receipt->save();

            return $response->redirect_url;
        }
    }
    public function authorizeNetFailed(Request $request)
    {
        return view("authorizeNet-payment-failed");
    }
    public function authorizeNetSuccess(Request $request)
    {
    }
    public function bankAccountPaymentSuccess(Request $request)
    {
        $vin = $request->vin;
        $receipt = Receipt::find($request->receipt);
        $bank    = BankAccounts::find($request->bank);
        return view("bankAccountPaymentSuccess", [
            "vin" => $vin,
            "receipt" => $receipt,
            "bank" => $bank,
        ]);
    }
    public function uploadBankAccountPaymentScreenshot(Request $request)
    {
        //adding user_image file to folder
        $screenshot = $request->file('screenshot');
        $screenshot_name = "PaymentScreenshot" . md5(microtime()) . '.' . $screenshot->getClientOriginalExtension();
        $destinationPath = './payment-screenshots';
        $screenshot->move($destinationPath, $screenshot_name);

        $receipt = Receipt::find($request->receipt);
        $receipt->bank_payment_screenshot = $screenshot_name;
        $receipt->seen_by_admin = 0;
        $receipt->save();

        return redirect("bank-account-payment-success" . '/' . $request->vin . '/' . $request->receipt . '/' . $request->bank);
    }
    public function cancelBankPayment(Request $request)
    {
        $vin = $request->vin;
        $bank = BankAccounts::find($request->bank);

        $receipt = Receipt::find($request->receipt);
        $receipt->payment_status = "Canceled";
        $receipt->save();

        return redirect("/");
    }
    public function payUsingBankAccount(Request $request)
    {
        $vin = $request->vin;
        $receipt = Receipt::find($request->receipt);
        $bank = BankAccounts::find($request->bank);
        return view("pay-using-bank-account", [
            "vin" => $vin,
            "receipt" => $receipt,
            "bank" => $bank,
        ]);
    }
    public function payTabsHostedReturnURL(Request $request)
    {
        $settings = Setting::first();

        $receipt = Receipt::where("paytabs_order_id", $request->paytabs_order_id)->first();

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://secure.paytabs.com/payment/query',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{  "profile_id": "' . $settings->paytabs_profile_id . '",  "tran_ref": "' . $receipt->transaction_id . '"}',
            CURLOPT_HTTPHEADER => array(
                'authorization: ' . $settings->paytabs_authorization_key,
                'Content-Type: text/plain'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $response = json_decode($response);

        if ($response->payment_result->response_status == 'A') {

            $receipt = Receipt::where("paytabs_order_id", $request->paytabs_order_id)->first();
            $receipt->payment_status = "succeeded";
            $receipt->save();

            $report = $this->generateReportAndSave($receipt->user_id,$receipt->vin);
            // $report_id = $this->report_show($receipt->vin);
            // $report = new Reports;
            // $report->user_id    = $receipt->user_id;
            // $report->report_id  = $report_id;
            // $report->report_url = 'uploads/' . $report_id . '.pdf';
            // $report->vin        = $receipt->vin;
            // $report->save();

            $user  = User::find($receipt->user_id);

            Mail::to($user->email)->send(new SendReport($report));

            header("Location: " . url('finish_order') . '/' . $report->report_id);
        } else {

            $receipt = Receipt::where("paytabs_order_id", $request->paytabs_order_id)->first();

            $receipt->payment_status = "failed";
            $receipt->save();

            return redirect("paytabs-payment-failed");
        }
    }
    public function payTabsReturnURL(Request $request)
    {
        $settings = Setting::first();

        $receipt = Receipt::where("paytabs_order_id", $request->paytabs_order_id)->first();

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://secure.paytabs.com/payment/query',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{  "profile_id": "' . $settings->paytabs_profile_id . '",  "tran_ref": "' . $receipt->transaction_id . '"}',
            CURLOPT_HTTPHEADER => array(
                'authorization: ' . $settings->paytabs_authorization_key,
                'Content-Type: text/plain'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $response = json_decode($response);

        if ($response->payment_result->response_status == 'A') {

            $receipt = Receipt::where("paytabs_order_id", $request->paytabs_order_id)->first();
            $receipt->payment_status = "succeeded";
            $receipt->save();

            $report = $this->generateReportAndSave($receipt->user_id,$receipt->vin);
            // $report_id = $this->report_show($receipt->vin);
            // $report = new Reports;
            // $report->user_id = $receipt->user_id;
            // $report->report_id = $report_id;
            // $report->report_url = 'uploads/' . $report_id . '.pdf';
            // $report->vin = $receipt->vin;
            // $report->save();

            $user  = User::find($receipt->user_id);

            Mail::to($user->email)->send(new SendReport($report));

            header("Location: " . url('finish_order') . '/' . $report->report_id);
        } else {

            $receipt = Receipt::where("paytabs_order_id", $request->paytabs_order_id)->first();

            $receipt->payment_status = "failed";
            $receipt->save();

            return redirect("paytabs-payment-failed");
        }
    }
    public function generatePayTabsPaymentLink(Request $request)
    {
        $settings = Setting::first();

        $amount = $request->price;

        $invoice_id = "No Transaction Id";

        if (auth()->check()) {
            $userid = auth()->user()->id;
        } else {
            $userid =  $this->checkUser(request()->data['email']);
        }


        $curl = curl_init();

        $random_order_id = mt_rand();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://secure.paytabs.com/payment/request',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
         "profile_id": ' . $settings->paytabs_profile_id . ',
         "tran_type": "sale",
         "tran_class": "ecom" ,
         "cart_id":"PCEAT-' . $random_order_id . '",
         "cart_description": "PCEAT-' . $random_order_id . '",
         "cart_currency": "' . $settings->paytabs_currency . '",
         "cart_amount": "' . $amount . '",
         "callback": "https://eliteglobalcheck.com/paytabs-callback-url/' . $random_order_id . '",
         "return": "https://eliteglobalcheck.com/paytabs-return-url/' . $random_order_id . '"
         }',
            CURLOPT_HTTPHEADER => array(
                'authorization: ' . $settings->paytabs_authorization_key,
                'Content-Type: text/plain'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $response = json_decode($response);

        $invoice_id = $response->tran_ref;

        $receipt = new Receipt;
        $receipt->user_id  = $userid;
        $receipt->payment_method  = 'Paytabs';
        $receipt->transaction_id  = $invoice_id;
        $receipt->paytabs_order_id  = $random_order_id;
        $receipt->currency_code  = $settings->paytabs_currency;
        $receipt->amount  = $amount;
        $receipt->payment_status  = "Pending";
        $receipt->package  = request()->package;
        $receipt->vin  = request()->data['vin'];
        $receipt->save();

        $report = $this->generateReportAndSave($receipt->user_id,$receipt->vin);
        // $report_id = $this->report_show($receipt->vin);
        // $report = new Reports;
        // $report->user_id = $receipt->user_id;
        // $report->report_id = $report_id;
        // $report->report_url = 'uploads/'.$report_id.'.pdf';
        // $report->vin = $receipt->vin;
        // $report->save();

        return ['success' => true, 'redirect_url' => $response->redirect_url];
    }
    public function generateBankAccountPaymentLink(Request $request)
    {
        $bank_account = BankAccounts::find($request->bank_account);
        $amount = $request->price;

        $invoice_id = "No Transaction Id";

        if (auth()->check()) {
            $userid = auth()->user()->id;
        } else {
            $userid =  $this->checkUser($request["data"]['email']);
        }

        $receipt = new Receipt;
        $receipt->user_id  = $userid;
        $receipt->payment_method  = 'Bank - ' . $bank_account->bank_name;
        $receipt->transaction_id  = $invoice_id;
        $receipt->currency_code  = 'USD';
        $receipt->amount  = $amount;
        $receipt->payment_status  = "Pending";
        $receipt->package  = request()->package;
        $receipt->vin  = $request["data"]['vin'];
        $receipt->save();

        // $report = $this->generateReportAndSave($receipt->user_id,$receipt->vin);
        // $report_id = $this->report_show($receipt->vin);
        // $report = new Reports;
        // $report->user_id = $receipt->user_id;
        // $report->report_id = $report_id;
        // $report->report_url = 'uploads/'.$report_id.'.pdf';
        // $report->vin = $receipt->vin;
        // $report->save();

        $invoice_url = url('pay-using-bank-account') . '/' . $request["data"]['vin'] . '/' . $receipt->id . '/' . $bank_account->id;

        if ($request['checktwo'] == "true") {
            $invoice_url = env('VIN_CHECKOUT_URL_TWO');
            $button_url = env('VIN_BUTTON_URL_TWO', '');

        } else {
            $invoice_url = env('VIN_CHECKOUT_URL');
            $button_url = env('VIN_BUTTON_URL', '');
        }

        function getButtonIdFromUrl($url) {
            $parsed_url = parse_url($url);
            $path = rtrim($parsed_url['path'], '/');
            return basename($path);
        }

        $button_id = getButtonIdFromUrl($invoice_url);

        return ['success' => true, 'invoice_url' => $invoice_url, 'button_url' => $button_url, 'button_id' => $button_id];
    }
    public function coinremitterNotify(Request $request)
    {
        $wallet = CoinremitterWallet::find($request->wallet);

        $receipt = Receipt::where("vin", $request->vin)->orderBy("id", "desc")->first();

        $params = [
            'coin' => $wallet->coin,
            'api_key' => $wallet->wallet_api_key,
            'password' => $wallet->wallet_password,
            "invoice_id" => $receipt->transaction_id,
        ];

        $obj = new CoinRemitter($params);

        $transaction = $obj->get_invoice($params);

        if ($transaction['data']['status'] == 'Paid') {
            $receipt->payment_status = "Completed";
            $receipt->save();

            $report = Reports::where("vin", $receipt->vin)->orderBy("id", "desc")->first();

            Mail::to($user->email)->send(new SendReport($report));
        }
    }
    public function coinremitterFailed(Request $request)
    {
        $receipt = Receipt::where("transaction_id", session('coinremitter_invoice_id'))->first();
        $receipt->payment_status = "Failed";
        $receipt->save();
        return view("coinremitter-payment-failed");
    }

    public function paytabsFailed(Request $request)
    {
        return view("paytabs-payment-failed");
    }

    public function coinremitterSuccess(Request $request)
    {
        $wallet = CoinremitterWallet::find(session('coinremitter_wallet'));
        $params = [
            'coin' => $wallet->coin,
            'api_key' => $wallet->wallet_api_key,
            'password' => $wallet->wallet_password,
            "invoice_id" => session('coinremitter_invoice_id'),
        ];

        $obj = new CoinRemitter($params);

        $transaction = $obj->get_invoice($params);

        if ($transaction['data']['status'] == 'Paid') {
            $receipt = Receipt::where("transaction_id", session('coinremitter_invoice_id'))->orderBy("id", "desc")->first();

            $receipt->payment_status = "Completed";
            $receipt->save();


            $report = Reports::where("vin", $receipt->vin)->orderBy("id", "desc")->first();

            header("Location: " . url('finish_order') . '/' . $report->report_id);
        } else {
            $receipt = Receipt::where("transaction_id", session('coinremitter_invoice_id'))->first();
            $receipt->payment_status = "Failed";
            $receipt->save();
            return view("coinremitter-payment-failed");
        }
    }
    public function testing(Request $request)
    {
    }
    public function makeAuthorizeNetPayment(Request $request)
    {
        $settings = Setting::first();
        $ex_date = $request->card_exp_year . '-' . $request->card_exp_month;

        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName($settings->authorizeNet_api_login_id);
        $merchantAuthentication->setTransactionKey($settings->authorizeNet_transaction_key);

        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber($request->card);

        $creditCard->setExpirationDate($ex_date);

        $creditCard->setCardCode($request->cvc);  // add in
        $paymentOne = new AnetAPI\PaymentType();
        $paymentOne->setCreditCard($creditCard);


        if (auth()->check()) {
            $userid = auth()->user()->id;
        } else {
            $userid =  $this->checkUser(request()->data['email']);
        }

        $user = User::find($userid);

        $customerData = new AnetAPI\CustomerDataType();
        $customerData->setType("individual");
        $customerData->setEmail($user->email);

        // Set the customer's Bill To address add this section in
        $customerAddress = new AnetAPI\CustomerAddressType();
        $customerAddress->setFirstName($user->name);
        $customerAddress->setAddress($request->street_address);
        $customerAddress->setCity($request->city);
        $customerAddress->setState($request->state);
        $customerAddress->setZip($request->zip_code);

        if ($request->country == 'United States of America') {
            $country = "USA";
        } else if ($request->country == 'Canada') {
            $country = "CA";
        }

        $customerAddress->setCountry($country);

        $transactionRequestType = new AnetAPI\TransactionRequestType();
        $transactionRequestType->setTransactionType("authCaptureTransaction");
        $transactionRequestType->setAmount($request->price);

        $transactionRequestType->setCustomer($customerData);
        $transactionRequestType->setBillTo($customerAddress);
        $transactionRequestType->setPayment($paymentOne);
        $APIrequest = new AnetAPI\CreateTransactionRequest();
        $APIrequest->setMerchantAuthentication($merchantAuthentication);

        $APIrequest->setTransactionRequest($transactionRequestType);
        $controller = new AnetController\CreateTransactionController($APIrequest);
        // $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
        $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::PRODUCTION);
        if ($response != null) {
            $tresponse = $response->getTransactionResponse();
            if (($tresponse != null) && ($tresponse->getResponseCode() == "1")) {
                $receipt = new Receipt;
                $receipt->user_id  = $userid;
                $receipt->payment_method  = 'Authorize.Net';
                $receipt->transaction_id  = $tresponse->gettransId();
                $receipt->currency_code  = 'USD';
                $receipt->amount  = $request->price;
                $receipt->payment_status  = "Succeeded";
                $receipt->package  = request()->package;
                $receipt->vin  = request()->data['vin'];
                $receipt->authorizeNet_payment_details = "Card : " . $request->card . "<br> Expiry Date : " . $ex_date . "<br> CVC : " . $request->cvc . "<br>" . "Name : " . $user->name . ",<br> Email : " . $user->email . ",<br>Phone Number : " . $user->phone_number . ",<br> Country : " . $request->country . ",<br> City : " . $request->city . ",<br> State : " . $request->state . ",<br> Zip Code : " . $request->zip_code . ",<br> Street Address : " . $request->street_address;
                $receipt->save();

                $report = $this->generateReportAndSave($userid,$receipt->vin);
                // $report_id = $this->report_show($receipt->vin);
                // $report = new Reports;
                // $report->user_id = $receipt->user_id;
                // $report->report_id = $report_id;
                // $report->report_url = 'uploads/' . $report_id . '.pdf';
                // $report->vin = $receipt->vin;
                // $report->save();

                return [
                    'success' => true,
                    'tid' => $tresponse->gettransId(),
                    'report_id' => $report_id,
                ];
            } else {
                return ['success' => false];
            }
        } else {
            return ['success' => false];
        }
    }
    public function generateCoinremitterPaymentLink(Request $request)
    {
        $wallet = CoinremitterWallet::find($request->wallet);

        if ($wallet->coin == "TCN") {
            $amount = 1;
        } else {
            $amount = $request->price;
        }

        $params = [
            'coin' => $wallet->coin,
            'api_key' => $wallet->wallet_api_key,
            'password' => $wallet->wallet_password,
            'amount' => $amount,
            'notify_url' => url('/') . "/coinremitter-notification-page.php?vin=" . request()->data['vin'] . "&&wallet=" . $request->wallet,
            'fail_url' => url('coinremitter/failed'),
            'success_url' => url('coinremitter/success'),
            'name' => 'my-invoice',
            'currency' => 'USD',
            'expire_time' => 60,
            'description' => 'My invoice description',
        ];


        $obj = new CoinRemitter($params);

        $invoice  = $obj->create_invoice($params);

        $invoice_id = $invoice['data']['invoice_id'];
        $invoice_url = $invoice['data']['url'];

        if (auth()->check()) {
            $userid = auth()->user()->id;
        } else {
            $userid =  $this->checkUser(request()->data['email']);
        }

        $receipt = new Receipt;
        $receipt->user_id  = $userid;
        $receipt->payment_method  = 'coinremitter - ' . $wallet->coin;
        $receipt->transaction_id  = $invoice_id;
        $receipt->currency_code  = 'USD';
        $receipt->amount  = $amount;
        $receipt->payment_status  = "Pending";
        $receipt->package  = request()->package;
        $receipt->vin  = request()->data['vin'];
        $receipt->save();

        $report = $this->generateReportAndSave($receipt->user_id,$receipt->vin);
        // $report_id = $this->report_show($receipt->vin);
        // $report = new Reports;
        // $report->user_id = $receipt->user_id;
        // $report->report_id = $report_id;
        // $report->report_url = 'uploads/' . $report_id . '.pdf';
        // $report->vin = $receipt->vin;
        // $report->save();

        Session(["coinremitter_invoice_id" => $invoice_id]);
        Session(["coinremitter_wallet" => $wallet->id]);

        return ['success' => true, 'invoice_url' => $invoice_url];
    }
    public function checkNewUnseenReceiptForAjax(Request $request)
    {
        $receipts = Receipt::where("seen_by_admin", 0)->get();

        $userId = Auth::id();
        // Define the query to count active sessions for the user
        $activeSessionCount = UserSession::where('user_id', $userId)
            ->where('last_activity_at', '>=', now()->subMinutes(50)) // Adjust the threshold as needed
            ->count();

        if (count($receipts) > 0) {
            foreach ($receipts as $receipt) {
                //greater then on equal to
                if ($receipt->sent_notify_count > $activeSessionCount) {
                    $receipt->seen_by_admin = 1;
                }
                $receipt->increment('sent_notify_count');
                $receipt->save();
            }
            echo "Y";
        }
    }

    public function index(Type $var = null)
    {
        //return new SendReport(Reports::first());
        //return bcrypt('testing');
        return view('index')->with([
            'title' =>  'Dashboard'
        ]);
    }

    public function checkout()
    {

        $paypalType = 'smartbutton'; //button, smartbutton
        return redirect()->route('checkoutvin', request()->vin);
        $vin = request()->vin;
        $ch1 = curl_init();
        curl_setopt($ch1, CURLOPT_URL, "https://nmvtis.vehiclehistorydata.com/speical_api_new/preview/$vin");
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch1, CURLOPT_REFERER, "lightapivin.xyz");
        //curl_setopt($ch1, CURLOPT_URL,"https://nmvtis.vehiclehistorydata.com/speical_api/preview/$vin");
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        $vin_data = curl_exec($ch1);
        echo "<div style='display:none' houssem> " . $vin_data . " </div>";
        curl_close($ch1);
        $data = json_decode($vin_data, true);
        if ($data['success'] == true) {
            $vdata = [
                'data'    =>  $data,
                'title'   =>  $data['title'],
                'engine'  => $data['engine'],
                'country' =>  $data['country'],
                'make'    =>  $data['make'],
                'vin'     => $vin,
            ];
            if ($paypalType == 'smartbutton') {
                return view('checkout.vin_found')->with($vdata);
            } else {
                return view('checkout.vin_found_paypal_button')->with($vdata);
            }
        } else {
            return view('checkout.vin_not_found');
        }
    }

    public function checkoutvin($vin)
    {

        $setting = Setting::first();


        $vinLeng = strlen($vin);

        if ($vinLeng != 17) {
            return view('checkout.vin_not_found_new', [
                "settings" => $setting,
            ])->with([]);
            // return redirect(route('index'))->with(['error' => 'Vin lenght should be 17']);
        }

        $checkReport = $this->generateReportAndSave(0, $vin, false);

        if(!$checkReport['status']){
            return view('checkout.vin_not_found_new', [
                "settings" => $setting,
            ])->with([]);
        }


        $paypalType = 'smartbutton'; //button, smartbutton
        $break_loop_1 = 0;

        try {
            while ($break_loop_1 == 0) {
                $data = $this->getNormalReport($vin);
                if (empty($data['Make'])) {
                    $setting = Setting::first();
                    return view('checkout.vin_not_found_new', [
                        "settings" => $setting,
                    ])->with([]);
                }
                if (!empty($data)) {
                    $break_loop_1 = 1;

                    $vdata = [
                        'data'    => $data,
                        'title'   => @$data['Make'] . ' ' . @$data['Model'] . " " . @$data['ModelYear'] . " " . @$data['BodyClass'],
                        'engine'  => @$data['EngineModel'] ?? null,
                        'country' => @$data['PlantState'] . ' ' . @$data['PlantCountry'] ?? null,
                        'make'    => @$data['Make'] ?? null,
                        'vin'     => $vin,
                    ];

                    $break_loop = 0;
                    while ($break_loop == 0) {
                        $data = $this->getNormalReport($vin);

                        if (!empty($data)) {
                            $break_loop = 1;

                            $setting = Setting::first();

                            if ($paypalType == 'smartbutton') {

                                if (!ctype_space($vdata['title'])) {

                                    $coinremitter_wallet_count = CoinremitterWallet::where("status", "Active")->count();

                                    $bank_accounts_count = BankAccounts::where("status", "Active")->count();

                                    if($checkReport['page'] == 1){
                                        $page = 'vin_found';
                                        $invoice_url = env('VIN_CHECKOUT_URL');
                                        $button_url = env('VIN_BUTTON_URL');
                                        function getButtonIdFromUrl($url) {
                                            $parsed_url = parse_url($url);
                                            $path = rtrim($parsed_url['path'], '/');
                                            return basename($path);
                                        }

                                        $button_id = getButtonIdFromUrl($invoice_url);

                                        return view('checkout.' .$page, [
                                            "settings" => $setting,
                                            "coinremitter_wallet_count" => $coinremitter_wallet_count,
                                            "bank_accounts_count" => $bank_accounts_count,
                                            "button_id" => $button_id,
                                            "button_url" => $button_url,
                                        ])->with($vdata);
                                    }else{
                                        $page = 'vin_found_two';
                                        $invoice_url = env('VIN_CHECKOUT_URL_TWO');
                                        $button_url = env('VIN_BUTTON_URL_TWO');
                                        function getButtonIdFromUrl($url) {
                                            $parsed_url = parse_url($url);
                                            $path = rtrim($parsed_url['path'], '/');
                                            return basename($path);
                                        }

                                        $button_id = getButtonIdFromUrl($invoice_url);
                                        return view('checkout.' .$page, [
                                            "settings" => $setting,
                                            "coinremitter_wallet_count" => $coinremitter_wallet_count,
                                            "bank_accounts_count" => $bank_accounts_count,
                                            "button_id" => $button_id,
                                            "button_url" => $button_url,
                                        ])->with($vdata);
                                    }
                                } else {
                                    return view('checkout.vin_not_found_new', [
                                        "settings" => $setting,
                                    ])->with($vdata);
                                }
                            } else {
                                return view('checkout.vin_found_paypal_button', [
                                    "settings" => $setting,
                                ])->with($vdata);
                            }
                        }
                    }
                }
            }
        } catch (\Exception $e) {
            $setting = Setting::first();
            return view('checkout.vin_not_found_new', [
                "settings" => $setting,
            ])->with([]);
        }
    }

    // public function checkoutvin($vin){

    // 	$paypalType = 'button'; //button, smartbutton
    // 	$break_loop_1 = 0;

    //     while($break_loop_1 == 0) {
    // 	    $ch1 = curl_init();
    //         curl_setopt($ch1, CURLOPT_URL,"https://nmvtis.vehiclehistorydata.com/speical_api_new/preview/$vin");
    //         curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
    //         curl_setopt($ch1, CURLOPT_REFERER, "lightapivin.xyz");
    // 	    //curl_setopt($ch1, CURLOPT_URL,"https://nmvtis.vehiclehistorydata.com/speical_api/preview/$vin");
    // 	    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
    //         $vin_data = curl_exec($ch1);
    //         curl_close ($ch1);
    //         $data = json_decode($vin_data, true);

    //         if(!empty($data)) {
    //             $break_loop_1 = 1;
    //             if($data['success'] == true){
    //     			$vdata = [
    //                     'data'    =>  $data,
    //                     'title'   =>  $data['title'],
    //                     'engine'  => $data['engine'],
    //                     'country' =>  $data['country'],
    //                     'make'    =>  $data['make'],
    //                     'vin'     => $vin,
    //                 ];

    //                 $break_loop = 0;
    //         	    while($break_loop == 0) {

    //             	    $vin = $vin;
    //             		$ch1 = curl_init();
    //                     // curl_setopt($ch1, CURLOPT_URL,"https://nmvtis.vehiclehistorydata.com/api/extended/$vin?&api_key=$api_key");
    //                     curl_setopt($ch1, CURLOPT_URL,"https://nmvtis.vehiclehistorydata.com/speical_api_new/checkvin/$vin");
    //                     curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
    //                     $vin_data = curl_exec($ch1);
    //                     curl_close ($ch1);
    //             		$data = json_decode($vin_data, true);
    //         		    if(!empty($data)) {
    //         		        $break_loop = 1;
    //         		        //  update database api code
    //         		        $ch = curl_init();

    //                         curl_setopt($ch, CURLOPT_URL,"https://nmvtis.vehiclehistorydata.com/speical_api_new/checkvin/updateerrorcode");
    //                         curl_setopt($ch, CURLOPT_POST, 1);

    //                         curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query(array('error_code' => 'ErrorCode')));

    //                         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //                         $server_output = curl_exec($ch);
    //                         curl_close ($ch);

    //                         $setting = Setting::first();

    //                         if($paypalType == 'smartbutton') {

    //                             if(!ctype_space($vdata['title'])) {

    //                                 $coinremitter_wallet_count = CoinremitterWallet::where("status","Active")->count();

    //                                 $bank_accounts_count = BankAccounts::where("status","Active")->count();

    //                 				return view('checkout.vin_found',[
    //                 				    "settings" => $setting,
    //                 				    "coinremitter_wallet_count" => $coinremitter_wallet_count,
    //                 				    "bank_accounts_count" => $bank_accounts_count,
    //                 				])->with($vdata);
    //                             } else {
    //                                 return view('checkout.vin_not_found_new',[
    //                 				    "settings" => $setting,
    //                 				])->with($vdata);
    //                             }
    //                         } else {
    //             				return view('checkout.vin_found_paypal_button',[
    //             				    "settings" => $setting,
    //             				])->with($vdata);
    //             			}
    //         		    }
    //         	    }

    //             } else {
    //             // return view('checkout.vin_not_found');
    //             }
    //         }
    // 	}

    // }


    public function report_show($vin)
    {
        return $this->generateNormalReport($vin);
    }
    /*
	public function report_show($vin){
		$report_id = rand(000000,999999);
        $ch1 = curl_init();
		curl_setopt($ch1, CURLOPT_URL,"https://nmvtis.vehiclehistorydata.com/speical_api/api/$vin");
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        $vin_data = curl_exec($ch1);
        curl_close ($ch1);

		$data = [
            'title'	=>	json_decode($vin_data)->title,
            'engine'	=>	json_decode($vin_data)->engine,
            'trim'	=>	json_decode($vin_data)->trim,
            'vehicle'	=>	json_decode($vin_data)->vehicle,
            'body'	=>	json_decode($vin_data)->body,
            'year'	=>	json_decode($vin_data)->year,
            'make'	=>	json_decode($vin_data)->make,
            'manufacturer'	=>	json_decode($vin_data)->make,
            'plant_country'	=>	json_decode($vin_data)->plant_country,
            'transmission'	=>	json_decode($vin_data)->transmission,
            'driveline'	=>	json_decode($vin_data)->driveline,
            'abs'	=>	json_decode($vin_data)->abs,
            'seating'	=>	json_decode($vin_data)->seating,
            'recalls'	=>	json_decode($vin_data)->recalls,
            'vin'	=>	$vin,
			'report_id' =>  $report_id,
        ];
		//return var_dump($data['recalls']);
		//return view('report_show_new',$data);
		$pdf = PDF::loadView('report_show_new', $data);
        //return $pdf->stream('document.pdf');
		$pdf->save('uploads/'.$report_id.'.pdf');
		return $report_id;
	}

	*/

    public function charge_from_card()
    {

        \Stripe\Stripe::setApiKey('');
        // \Stripe\Stripe::setApiKey('');
        $token = request()->stripe_token;


        try {
            $charge = \Stripe\Charge::create([
                'amount' => request()->price * 100,
                'currency' => 'usd',
                'description' => 'KPT History Report',
                'source' => $token['id'],
            ]);
            // If the charge was successful, you can do something here
        } catch (\Stripe\Exception\CardException $e) {
            // Since it's a decline, \Stripe\Exception\CardException will be caught
            $error = $e->getError();
            // You can display the error to the user or log it
            // For example:
            return response()->json(['error' => $error['message']]);
        } catch (\Stripe\Exception\RateLimitException $e) {
            // Too many requests made to the API too quickly
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            // Invalid parameters were supplied to Stripe's API
        } catch (\Stripe\Exception\AuthenticationException $e) {
            // Authentication with Stripe's API failed
            // (maybe you changed API keys recently)
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            // Network communication with Stripe failed
        } catch (\Stripe\Exception\ApiErrorException $e) {
            // Generic error occurred
            $error = $e->getError();
            return response()->json(['error' => $error['message']]);
        }


        //return var_dump(auth()->check());
        if (auth()->check()) {
            $userid =  auth()->user()->id;
        } else {
            $userid =  $this->checkUser(request()->data['email']);
        }
        //return $charge;
        if ($charge->status == 'succeeded') {
            //$userid =  $this->checkUser(request()->data['email']);
            $receipt = new Receipt;
            $receipt->user_id  = $userid;
            $receipt->payment_method  = 'stripe';
            $receipt->transaction_id  = $charge->id;
            $receipt->currency_code  = 'USD';
            $receipt->amount  = $charge->amount / 100;
            $receipt->payment_status  = $charge->status;
            $receipt->package  = request()->package;
            $receipt->save();

            $this->addPackage($userid, request()->package);
            $report = $this->generateReportAndSave($userid,request()->data['vin']);
            // $report_id = $this->report_show(request()->data['vin']);
            // $report = new Reports;
            // $report->user_id    = $userid;
            // $report->report_id  = $report_id;
            // $report->report_url = 'uploads/' . $report_id . '.pdf';
            // $report->vin        = request()->data['vin'];

            // $report->save();

            $user = User::findOrFail($userid);

            //Mail::to($user->email)->send(new SendReport($report));

            $user->update([
                'credits'   =>  $user->credits - 1
            ]);

            return ['success' => true, 'report_id' => $report->report_id];
        }
        return ['success' => false];
    }

    public function charge_from_card_no_vin($value = '')
    {
        \Stripe\Stripe::setApiKey('');
        // \Stripe\Stripe::setApiKey('sk_test_');
        $token = request()->stripe_token;
        $charge = \Stripe\Charge::create([
            'amount' => request()->price * 100,
            'currency' => 'usd',
            'description' => 'KPT History Report',
            'source' => $token['id'],
        ]);

        if ($charge->status == 'succeeded') {
            if (auth()->check()) {
                $userid = auth()->user()->id;
            } else {
                $userid =  $this->checkUser(request()->data['email']);
            }

            $receipt = new Receipt;
            $receipt->user_id  = $userid;
            $receipt->payment_method  = 'stripe';
            $receipt->transaction_id  = $charge->id;
            $receipt->currency_code  = 'USD';
            $receipt->amount  = $charge->amount / 100;
            $receipt->payment_status  = $charge->status;
            $receipt->package  = request()->package;
            $receipt->save();

            $this->addPackage($userid, request()->package);

            return ['success' => true, 'report_id' => $receipt->id];
        }
        return ['success' => false];
    }
    public function charge_from_paypal()
    {
        $userid =  $this->checkUser(request()->data['email']);

        $receipt = new Receipt;
        $receipt->user_id  = $userid;
        $receipt->payment_method  = 'paypal';
        $receipt->transaction_id  = request()->transaction_id;
        $receipt->currency_code  = 'USD';
        $receipt->amount  = request()->price;
        $receipt->payment_status  = request()->status;
        $receipt->package  = request()->package;
        $receipt->save();

        $this->addPackage($userid, request()->package);
        $report = $this->generateReportAndSave($userid,request()->data['vin']);
        // $report_id = $this->report_show(request()->data['vin']);
        // $report = new Reports;
        // $report->user_id = $userid;
        // $report->report_id = $report_id;
        // $report->report_url = 'uploads/' . $report_id . '.pdf';
        // $report->vin = request()->data['vin'];

        // $report->save();


        $user = User::findOrFail($userid);

        Mail::to($user->email)->send(new SendReport($report));

        $user->update([
            'credits'   =>  $user->credits - 1
        ]);

        return ['success' => true, 'report_id' => $report->report_id];
    }

    public function charge_from_paypal_no_vin($value = '')
    {
        if (auth()->check()) {
            $userid = auth()->user()->id;
        } else {
            $userid =  $this->checkUser(request()->data['email']);
        }

        $receipt = new Receipt;
        $receipt->user_id  = $userid;
        $receipt->payment_method  = 'paypal';
        $receipt->transaction_id  = request()->transaction_id;
        $receipt->currency_code  = 'USD';
        $receipt->amount  = request()->price;
        $receipt->payment_status  = request()->status;
        $receipt->package  = request()->package;
        $receipt->save();

        $this->addPackage($userid, request()->package);



        return ['success' => true, 'report_id' => $receipt->id];
    }

    public function finish_order($report_id)
    {

        // //return request()->all();
        // $userid =  $this->checkUser(request()->data['email']);

        // $receipt = new Receipt;
        // //$receipt->
        // return $userid;
        $report = Reports::where('report_id', $report_id)->first();
        return view('order_finish')->with(['report' =>  $report]);
    }

    public function finish_package_order($receipt_id)
    {
        $receipt = Receipt::find($receipt_id)->first();
        return view('order_package_finish')->with(['receipt' =>  $receipt]);
    }


    public function checkUser($email)
    {
        $user  = User::where('email', $email)->first();
        if (!$user) {
            $user  =  User::create([
                'name'  =>  request()->data['name'],
                'email'  =>  request()->data['email'],
                'password'  =>  bcrypt('demoUser01@&8'),
                'phone_number'  =>  request()->data['phone'],
                'credits'  =>  0,
            ]);
        }
        return $user->id;
    }

    public function createAndSaveReport($report_id)
    {
    }

    public function addPackage($userid, $package)
    {
        $user = User::findOrFail($userid);

        switch ($package) {
            case 'package1':
                $user->update([
                    'credits'   =>  $user->credits + 1
                ]);
                break;
            case 'package2':
                $user->update([
                    'credits'   =>  $user->credits + 2
                ]);
                break;
            case 'package3':
                $user->update([
                    'credits'   =>  $user->credits + 5
                ]);
                break;
            case 'package4':
                $user->update([
                    'credits'   =>  $user->credits + 10
                ]);
                break;
            case 'package5':
                $user->update([
                    'credits'   =>  $user->credits + 25
                ]);
                break;
            case 'package6':
                $user->update([
                    'credits'   =>  $user->credits + 50
                ]);
                break;
            default:
                # code...
                break;
        }
    }

    public function charge_from_btc($value = '')
    {
        $ch2 = curl_init();
        // curl_setopt($ch2, CURLOPT_URL,"https://www.clearvin.com/payment/prepare?vin=".request()->vin);
        // curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);

        curl_setopt_array(
            $ch2,
            array(
                CURLOPT_URL => 'https://blockchain.info/tobtc?currency=USD&value=' . request()->price,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
            ),
        );
        $btcprice = curl_exec($ch2);
        curl_close($ch2);
        //return request()->data['vin'];
        //return json_decode($btcprice);
        if (auth()->check()) {
            $userid = auth()->user()->id;
        } else {
            $userid =  $this->checkUser(request()->data['email']);
        }
        $receipt = new Receipt;
        $receipt->user_id  = $userid;
        $receipt->payment_method  = 'btc';
        $receipt->transaction_id  = rand(000000000, 999999999);
        $receipt->currency_code  = 'BTC';
        $receipt->amount  = json_decode($btcprice);
        $receipt->payment_status  = 'pending';
        $receipt->package  = request()->package;
        $receipt->vin  = isset(request()->data['vin']) ? request()->data['vin'] : null;
        $receipt->save();

        return ['success' => true, 'transaction_id' => $receipt->transaction_id];
    }

    public function charge_from_btc_no_vin($value = '')
    {
        $ch2 = curl_init();
        // curl_setopt($ch2, CURLOPT_URL,"https://www.clearvin.com/payment/prepare?vin=".request()->vin);
        // curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);

        curl_setopt_array(
            $ch2,
            array(
                CURLOPT_URL => 'https://blockchain.info/tobtc?currency=USD&value=' . request()->price,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
            ),
        );
        $btcprice = curl_exec($ch2);

        curl_close($ch2);
        if (auth()->check()) {
            $userid = auth()->user()->id;
        } else {
            $userid =  $this->checkUser(request()->data['email']);
        }
        $receipt = new Receipt;
        $receipt->user_id  = $userid;
        $receipt->payment_method  = 'btc';
        $receipt->transaction_id  = rand(000000000, 999999999);
        $receipt->currency_code  = 'BTC';
        $receipt->amount  = json_decode($btcprice);
        $receipt->payment_status  = 'pending';
        $receipt->package  = request()->package;
        $receipt->vin  = isset(request()->data['vin']) ? request()->data['vin'] : null;
        $receipt->save();

        return ['success' => true, 'transaction_id' => $receipt->transaction_id];
    }

    public function btc_order($transaction_id)
    {
        return view('checkout.btc_order')->with([
            'receipt'   =>  Receipt::where('transaction_id', $transaction_id)->first()
        ]);
    }


    public function test_report($vin)
    {
        return $this->getCarfaxReport($vin);
        $report_id = rand(000000, 999999);
        $ch1 = curl_init();
        // curl_setopt($ch1, CURLOPT_URL,"https://nmvtis.vehiclehistorydata.com/api/extended/$vin?&api_key=$api_key");
        curl_setopt($ch1, CURLOPT_URL, "https://nmvtis.vehiclehistorydata.com/speical_api_new/api/$vin");
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        $vin_data = curl_exec($ch1);
        curl_close($ch1);
        $data = json_decode($vin_data, true);
        $data = [
            'vindata'   =>  $data['result'],
            'recalldata' =>  $data['recalls'],
            'complaints' =>  $data['complaints'],
            'engine'    =>  $data['engine'],
            'report_id' =>  $report_id,
            'vehicle'   =>  $data['title'],
        ];

        return view('reports.test_report', $data);
    }

    public function invoiceView($id)
    {
        $receipt = Receipt::with('user')->where('id', $id)->firstOrFail();

        return view('invoice', compact('receipt'));
    }


    public function viniReport($vin)
    {
        $report = Reports::where('report_id', $vin)->firstOrFail();
        $html = $report->response;
        // dd($html);
        return $html;
    }

    public function sellfyWebhook(Request $request){

        $data = $request->all();
        $dataId = $data['id'];
        $web = Webhook::whereJsonContains('data->id', $dataId)->first();
        if($web)
            return response()->json(['success' => true]);
        // save into database webhook table
        $webhook = new Webhook;
        $webhook->type = 'sellfy';
        $webhook->data = json_encode($data);
        $webhook->is_report = 0;
        $webhook->save();

        $this->sendAutoInvoice($data);

        return response()->json(['success' => true]);
    }

    public function sendAutoInvoice($data){

        $email = $data['customer']['email'];

        // get user from email
        $user = User::where('email', $email)->first();
        if(!$user)
            return false;
        try{
            $webhook = Webhook::whereJsonContains('data->customer->email', $email)->where('type', 0)->latest()->first();
            $receipt = Receipt::with('user')->where('user_id', $user->id)->where('payment_status','Pending')->latest()->first();


            $report = $this->generateReportAndSave($user->id,$receipt->vin, true);


            $webhook->update([
                'is_report' => 1
            ]);
            $receipt->update([
                'payment_status' => 'Succeeded'
            ]);
            \Log::info('auto invoice done :'.$receipt->vin);
            Mail::to($email)->send(new SendReport($report));
        }catch(\Exception $e){
            \Log::info('auto invoice email error', ['error' => $e->getMessage()]);
        }

    }

    public function normalReport(){
        return view('reports.normal');
    }

    // public function sendAutoInvoice(){

    //     $webhooks = Webhook::where('is_report', 0)->get();
    //     // delete all null data webhooks or []
    //     foreach($webhooks as $webhook){
    //         if($webhook->data == '[]' || $webhook->data == null){
    //             $webhook->delete();
    //         }else{
    //             $data = json_decode($webhook->data, true);
    //             // get the email from webhook data
    //             $email = $data['customer']['email'];

    //             // get user from email
    //             $user = User::where('email', $email)->first();
    //             // get latest receipt of user
    //             if(!$user)
    //                 continue;

    //             $receipt = Receipt::with('user')->where('user_id', $user->id)->where('payment_status','Pending')->latest()->first();

    //             $settings = Setting::first();
    //             $report_type_vini = $settings->report_type_vini;
    //             if($report_type_vini == 1){
    //                 $specResult = $this->checkViniReport($receipt->vin);
    //                 if(!$specResult){
    //                     \Log::info('auto invoice error', ['error' => 'Spec Report Not Found']);
    //                     return false;
    //                 }
    //             }
    //             $report = $this->generateReportAndSave($user->id, $receipt->vin);
    //             try{
    //                 Mail::to($email)->send(new SendReport($report));
    //                 $webhook->is_report = 1;
    //                 $webhook->save();

    //                 $receipt->update([
    //                     'payment_status' => 'Succeeded'
    //                 ]);

    //             }catch(\Exception $e){
    //                 \Log::info('auto invoice email error', ['error' => $e->getMessage()]);
    //                 dd($e->getMessage());
    //             }
    //         }
    //     }
    // }
}
