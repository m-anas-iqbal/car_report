<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use PHPHtmlParser\Dom;

use App\Models\User;
use App\Models\Receipt;
use App\Models\Reports;
use App\Models\Setting;
use PDF;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendReport;


class HomeController extends Controller
{
    public function index(Type $var = null)
    {
        //return new SendReport(Reports::first());
        //return bcrypt('testing');

//         $curl = curl_init();

// curl_setopt_array($curl, array(
//   CURLOPT_URL => 'https://www.clearvin.com/',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 0,
//   CURLOPT_FOLLOWLOCATION => true,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => 'GET',
//   CURLOPT_HTTPHEADER => array(
//     'Cookie: incap_ses_500_2331278=vJjnVSEj22GylOsPm1vwBkxBiGAAAAAAd4Fp7aY+hecR9m9cPRywfQ==; visid_incap_2331278=uD91NdqfTNqNNHTEkYaxQDRBiGAAAAAAQUIPAAAAAAAwPt4lBhjCAA3mpBixsMXW; i18next=en; visitedPageInThisSession=5'
//   ),
// ));

// $response = curl_exec($curl);

// curl_close($curl);
// echo $response;

        return view('index')->with([
            'title' =>  'Dashboard'
        ]);
    }

    public function checkout (){


        $vin = request()->vin;
        $api_key = "146d9c721ae437709dee33423d6024079d65087b43bc217b984a7b0ede41170e";
        $ch1 = curl_init();
        curl_setopt($ch1, CURLOPT_URL,"https://nmvtis.vehiclehistorydata.com/api/preview/$vin?&api_key=$api_key");
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch1, CURLOPT_REFERER, "lightapivin.xyz");
        $vin_data = curl_exec($ch1);
        curl_close ($ch1);
        $data = json_decode($vin_data, true);
        $ch2 = curl_init();
        // curl_setopt($ch2, CURLOPT_URL,"https://www.clearvin.com/payment/prepare?vin=".request()->vin);
        // curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);

        curl_setopt_array($ch2, array(
          CURLOPT_URL => 'https://www.faxvin.com/order/decoder?vin='.$vin,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
        ));
        $vehicle_info_html = curl_exec($ch2);
        curl_close ($ch2);
        $dom = new Dom;
        $dom->loadStr($vehicle_info_html);
        $vehicle = $dom->find('.tableinfo')[0];
        $eng = $dom->find('.gray')[1];
        $engine =  strip_tags($vehicle->find('td b')[6]);
        $trim =  strip_tags($vehicle->find('td b')[4]);
        //return $engine;
        if($data['success'] == true){
            return view('checkout.vin_found')->with([
                'data'  =>  $data,
                'engine' => $engine,
                'vehicle'   =>   $vehicle
            ]);
        }else{
            return view('checkout.vin_not_found');
        }
    }


    public function report_show($vin){
         $api_key = "146d9c721ae437709dee33423d6024079d65087b43bc217b984a7b0ede41170e";
         $report_id = rand(000000,999999);
         $ch1 = curl_init();
         //curl_setopt($ch1, CURLOPT_URL,"https://vpic.nhtsa.dot.gov/api/vehicles/decodevinvalues/".$vin."?format=json");
         curl_setopt($ch1, CURLOPT_URL,"https://nmvtis.vehiclehistorydata.com/api/extended/$vin?&api_key=$api_key");
         curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch1, CURLOPT_REFERER, "lightapivin.xyz");
         $vin_data = curl_exec($ch1);
         curl_close ($ch1);
         //return $vin_data;
         //$vinresults  = json_decode($vin_data)->Results[0];
         $vinresults  = json_decode($vin_data)->vin_data;
         $recalldata  = json_decode($vin_data)->recalls;
         $preview  = json_decode($vin_data)->preview;

         //return var_dump($preview);

         //return var_dump($recalldata);

            //return response()->json($vinresults->ModelYear);

            // $ch2 = curl_init();
            // curl_setopt($ch2, CURLOPT_URL,"https://www.clearvin.com/payment/prepare?vin=".$vin);
            // curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
            // $vehicle_info_html = curl_exec($ch2);
            // curl_close ($ch2);
            // $dom = new Dom;
            // $dom->loadStr($vehicle_info_html);
            // $vehicle = $dom->find('.vehicle-inf strong');
            // $eng = $dom->find('.gray')[1];
            // $engine =  str_replace('Engine', '', strip_tags($eng));

        // $ch2 = curl_init();
            // curl_setopt($ch2, CURLOPT_URL,"https://www.clearvin.com/payment/prepare?vin=".request()->vin);
            // curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);

        // curl_setopt_array($ch2, array(
        //   CURLOPT_URL => 'https://www.faxvin.com/order/decoder?vin='.$vin,
        //   CURLOPT_RETURNTRANSFER => true,
        //   CURLOPT_ENCODING => '',
        //   CURLOPT_MAXREDIRS => 10,
        //   CURLOPT_TIMEOUT => 0,
        //   CURLOPT_FOLLOWLOCATION => true,
        // ));
        // $vehicle_info_html = curl_exec($ch2);
        // curl_close ($ch2);
        // $dom = new Dom;
        // $dom->loadStr($vehicle_info_html);
        // $vehicle = $dom->find('.tableinfo')[0];
        // $eng = $dom->find('.gray')[1];
        // $engine =  strip_tags($vehicle->find('td b')[6]);
        // $trim =  strip_tags($vehicle->find('td b')[4]);
        //return $vehicle;

        // $ch3 = curl_init();
        // //curl_setopt($ch3, CURLOPT_URL,"https://one.nhtsa.gov/webapi/api/Recalls/vehicle/modelyear/".$vinresults->ModelYear."/ma"."ke/".$vinresults->Make."/mo"."del/".$vinresults->Model."?format=json");
        // curl_setopt($ch3, CURLOPT_URL,"https://nmvtis.vehiclehistorydata.com/api/extended/$vin?&api_key=$api_key");
        // curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch1, CURLOPT_REFERER, "lightapivin.xyz");
        // curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);
        // $recall_data = curl_exec($ch3);
        // curl_close ($ch3);
        // $recalldata  = json_decode($recall_data);

        //return $recalldata;

        $data = [
            'vindata'   =>  $vinresults,
            'recalldata'=> $recalldata,
            'engine'    =>  $preview->engine,
            'report_id' =>  $report_id,
            'vehicle'   =>  $preview->vehicle,
            'trim'   =>  $preview->trim,
        ];
            // return view('report_show')->with([
            //     'vindata'   =>  $vinresults,
            //     'recalldata'=> $recalldata,
            //     'engine'    =>  $engine
            // ]);
        return view('report_show', $data);
        $pdf = PDF::loadView('report_show', $data);
        $pdf->save('uploads/'.$report_id.'.pdf');
        return $report_id;
    }

    public function charge_from_card(){
        \Stripe\Stripe::setApiKey('');
            //\Stripe\Stripe::setApiKey('');
        $token = request()->stripe_token;
        $charge = \Stripe\Charge::create([
            'amount' => request()->price * 100,
            'currency' => 'usd',
            'description' => 'VIN Report Purchase',
            'source' => $token['id'],
        ]);
            //return $charge;
        if($charge->status == 'succeeded'){
            $userid =  $this->checkUser(request()->data['email']);
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
            $report_id = $this->report_show(request()->data['vin']);
            $report = new Reports;
            $report->user_id = $userid;
            $report->report_id = $report_id;
            $report->report_url = 'uploads/'.$report_id.'.pdf';
            $report->vin = request()->data['vin'];

            $report->save();

            $user = User::findOrFail($userid);

            //Mail::to($user->email)->send(new SendReport($report));

            $user->update([
                'credits'   =>  $user->credits - 1
            ]);

            return ['success' => true, 'report_id' =>$report->report_id];
        }
        return ['success' => false];
    }

    public function charge_from_card_no_vin($value='')
    {
        \Stripe\Stripe::setApiKey('sk_test_51I8uLdH2bhOP6mplh7ZtajTLQuSsYNRi84FVwCb0cgnZf9GiLp2illSYnb2WlB3PzfF51FXhOv7KjKn6eog49UsO00zVvlHPHK');
        $token = request()->stripe_token;
        $charge = \Stripe\Charge::create([
            'amount' => request()->price * 100,
            'currency' => 'usd',
            'description' => 'VIN Report Purchase',
            'source' => $token['id'],
        ]);

        if($charge->status == 'succeeded'){
            if(auth()->check()){
                $userid = auth()->user()->id;
            }else{
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

            return ['success' => true, 'report_id' =>$receipt->id];
        }
        return ['success' => false];
    }
    public function charge_from_paypal(){
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
        $report_id = $this->report_show(request()->data['vin']);
        $report = new Reports;
        $report->user_id = $userid;
        $report->report_id = $report_id;
        $report->report_url = 'uploads/'.$report_id.'.pdf';
        $report->vin = request()->data['vin'];

        $report->save();


        $user = User::findOrFail($userid);

        Mail::to($user->email)->send(new SendReport($report));

        $user->update([
            'credits'   =>  $user->credits - 1
        ]);

        return ['success' => true, 'report_id' =>$report->report_id];
    }

    public function charge_from_paypal_no_vin($value='')
    {
        if(auth()->check()){
            $userid = auth()->user()->id;
        }else{
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



        return ['success' => true, 'report_id' =>$receipt->id];
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


    public function checkUser($email){
        $user  = User::where('email', $email)->first();
        if(!$user){
            $user  =  User::create([
                'name'  =>  request()->data['name'],
                'email'  =>  request()->data['email'],
                'password'  =>  bcrypt(request()->data['password']),
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

    public function charge_from_btc($value='')
    {
        $ch2 = curl_init();
            // curl_setopt($ch2, CURLOPT_URL,"https://www.clearvin.com/payment/prepare?vin=".request()->vin);
            // curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);

            curl_setopt_array($ch2, array(
              CURLOPT_URL => 'https://blockchain.info/tobtc?currency=USD&value='.request()->price,
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
        curl_close ($ch2);
        //return request()->data['vin'];
        //return json_decode($btcprice);
        if(auth()->check()){
            $userid = auth()->user()->id;
        }else{
            $userid =  $this->checkUser(request()->data['email']);
        }
        $receipt = new Receipt;
        $receipt->user_id  = $userid;
        $receipt->payment_method  = 'btc';
        $receipt->transaction_id  = rand(000000000,999999999);
        $receipt->currency_code  = 'BTC';
        $receipt->amount  = json_decode($btcprice);
        $receipt->payment_status  = 'pending';
        $receipt->package  = request()->package;
        $receipt->vin  = isset(request()->data['vin'])? request()->data['vin'] : null;
        $receipt->save();

        return ['success' => true, 'transaction_id' => $receipt->transaction_id];
    }

    public function charge_from_btc_no_vin($value='')
    {
        $ch2 = curl_init();
            // curl_setopt($ch2, CURLOPT_URL,"https://www.clearvin.com/payment/prepare?vin=".request()->vin);
            // curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);

            curl_setopt_array($ch2, array(
              CURLOPT_URL => 'https://blockchain.info/tobtc?currency=USD&value='.request()->price,
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

        curl_close ($ch2);
        if(auth()->check()){
            $userid = auth()->user()->id;
        }else{
            $userid =  $this->checkUser(request()->data['email']);
        }
        $receipt = new Receipt;
        $receipt->user_id  = $userid;
        $receipt->payment_method  = 'btc';
        $receipt->transaction_id  = rand(000000000,999999999);
        $receipt->currency_code  = 'BTC';
        $receipt->amount  = json_decode($btcprice);
        $receipt->payment_status  = 'pending';
        $receipt->package  = request()->package;
        $receipt->vin  = isset(request()->data['vin'])? request()->data['vin'] : null;
        $receipt->save();

        return ['success' => true, 'transaction_id' => $receipt->transaction_id];
    }

    public function btc_order($transaction_id)
    {
        return view('checkout.btc_order')->with([
            'receipt'   =>  Receipt::where('transaction_id', $transaction_id)->first()
        ]);
    }
}
