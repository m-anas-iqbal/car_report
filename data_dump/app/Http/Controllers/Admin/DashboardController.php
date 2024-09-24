<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PHPHtmlParser\Dom;

use App\Models\User;
use App\Models\Receipt;
use App\Models\Reports;
use App\Models\BankAccounts;
use PDF;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendReport;
use App\Models\CoinremitterWallet;
use App\Models\Setting;
use DOMDocument;

class DashboardController extends Controller
{
    public function updatePaytabsGatewaySettings(Request $request)
    {
        $settings = Setting::first();
        $settings->paytabs_profile_id = $request->paytabs_profile_id;
        $settings->paytabs_currency = $request->paytabs_currency;
        $settings->paytabs_authorization_key = $request->paytabs_authorization_key;
        $settings->paytabs_api_client_key = $request->paytabs_api_client_key;
        $settings->save();
        
        return redirect()->back()->with("success","Keys Updated Successfully !");        
    }
    public function paytabsGatewaySettings(Request $request)
    {
        $settings = Setting::first();
        return view("admin.paytabsGatewaySettings",[
            "title" => "Paytabs Gateway Settings",    
            "settings" => $settings,    
        ]);
    }
    public function declineReceipt(Request $request)
    {
        $receipt = Receipt::find($request->id);
        $receipt->payment_status = "Declined";
        $receipt->save();
        return redirect()->back()->with("success","Receipt Declined !");
    }
    public function approveReceipt(Request $request)
    {
        $receipt = Receipt::find($request->id);
        $receipt->payment_status = "Approved";
        $receipt->save();
        return redirect()->back()->with("success","Receipt Approved !");
    }
    public function updateBankAccount(Request $request)
    {
        $bank_account = BankAccounts::find($request->id);
        $bank_account->bank_name = $request->bank_name;
        $bank_account->bank_info = $request->bank_info;
        $bank_account->waiting_time = $request->waiting_time;
        $bank_account->status = $request->status;
        $bank_account->save();
        
        return redirect()->back()->with("success","Bank Updated Successfully !");
    }
    public function editBankAccount(Request $request)
    {
        $bank_account = BankAccounts::find($request->id);
        return view("admin.editBankAccount",[
            "title" => "Edit Bank Account",
            "bank_account" => $bank_account,
        ]);
    }
    public function deleteBankAccount(Request $request)
    {
        $bank_account = BankAccounts::find($request->id);
        $bank_account->delete();
        
        return redirect()->back()->with("success","Bank Account Deleted Successfully !");
    }
    public function insertBankAccount(Request $request)
    {
        $bank_account = new BankAccounts;
        $bank_account->bank_name = $request->bank_name;
        $bank_account->bank_info = $request->bank_info;
        $bank_account->waiting_time = $request->waiting_time;
        $bank_account->status = $request->status;
        $bank_account->save();
        
        return redirect()->back()->with("success","Bank Inserted Successfully !");
        
    }
    public function addBankAccount(Request $request)
    {
        return view("admin.addBankAccount",[
            "title" => "Add Bank Account",    
        ]);
    }
    public function manageBankAccounts(Request $request)
    {
        $bank_accounts = BankAccounts::all();
        
        return view("admin.manageBankAccounts",[
            "title" => "Manage Bank Accounts",    
            "bank_accounts" => $bank_accounts,    
        ]);
    }
    public function updateCoinremitterWallet(Request $request)
    {
        $wallet = CoinremitterWallet::find($request->id);
        $wallet->coin = $request->coin;
        $wallet->wallet_api_key = $request->wallet_api_key;
        $wallet->wallet_password = $request->wallet_password;
        $wallet->status = $request->status;
        $wallet->save();
        
        return redirect()->back()->with("success","Wallet has been updated succesfully !");
        
    }
    public function editCoinremitterWallet(Request $request)
    {
        $wallets = CoinremitterWallet::get();
        $wallet = CoinremitterWallet::find($request->id);
        return view("admin.editCoinremitterWallet",[
            "title" => "Edit Coinremitter Wallet",    
            "wallets" => $wallets,    
            "wallet" => $wallet,    
        ]);        
    }
    public function deleteCoinremitterWallet(Request $request)
    {
        $wallet = CoinremitterWallet::find($request->id);
        $wallet->delete();
        return redirect()->back()->with("success","Wallet Deleted Successfully !");
    }
    public function storeCoinremitterWallet(Request $request)
    {
        $request->validate([
            "coin"            => "required",
            "wallet_api_key"  => "required",
            "wallet_password" => "required",
            "status"          => "required",
        ]);
        
        $wallet = new CoinremitterWallet;
        $wallet->coin = $request->coin;
        $wallet->wallet_api_key = $request->wallet_api_key;
        $wallet->wallet_password = $request->wallet_password;
        $wallet->status = $request->status;
        $wallet->save();
        
        return redirect()->back()->with("success","Wallet Added Successfully !");
    }
    public function updateAuthorizeNetGatewaySettings(Request $request)
    {
        $settings = Setting::first();
        $settings->authorizeNet = $request->authorizeNet;
        $settings->authorizeNet_api_login_id = $request->authorizeNet_api_login_id;
        $settings->authorizeNet_transaction_key = $request->authorizeNet_transaction_key;
        $settings->save();
        return redirect()->back()->with("success","Keys Updated Successfully !");
    }
    public function authorizeNetGatewaySettings()
    {
        $settings = Setting::first();
        return view("admin.authorizeNetGatewaySettings",[
            "title" => "Authorize.Net Gateway Settings",    
            "settings" => $settings,    
        ]);
    }
    public function coinremitterGatewaySettings()
    {
        $wallets = CoinremitterWallet::get();
        return view("admin.coinremitterGatewaySettings",[
            "title" => "Coinremitter Gateway Settings",    
            "wallets" => $wallets,    
        ]);
    }
    public function index(){
        return view('admin.dashboard')->with([
            'title' =>  'Dashboard'
        ]);
    }

    public function reports($value='')
    {
    	return view('admin.reports')->with([
    		'title'	=>	'VIN Reports',
    		'reports'	=>	Reports::latest()->latest()->paginate(15)
    	]);
    }

    public function receipts($value='')
    {
    	return view('admin.receipts')->with([
    		'title'	=>	'Transactions',
    		'receipts'	=>	Receipt::latest()->latest()->paginate(15)
    	]);
    }
    public function sendInvoice($orderId)
    {
    	$receipt = Receipt::with('user')->where('id', $orderId)->firstOrFail();
    	$data = ['receipt' => $receipt];
    	$subject = "REPORTVEHINFO REPORT Receipt.";
    	$email = $receipt->user->email;
    	$name = $receipt->user->name;
    	Mail::send(
            'emails.invoice', $data,
            function ($mail) use ($email, $name, $subject) {
                $mail->to($email, $name);
                $mail->subject($subject);
                $mail->from('invoice@reportvehinfo.com', 'INVOICE');
            }
        );
    	
    	return redirect()->back()->with("success","Keys Updated Successfully !");
    }

    public function users($value='')
    {
    	return view('admin.users')->with([
    		'title'	=>	'Users',
    		'users'	=>	User::latest()->latest()->paginate(15)
    	]);
    }

    public function send_report($value='')
    {
    	return view('admin.generate_send_report')->with([
    		'title'	=>	'Send Report via Email'
    	]);
    }
	
	public function send_report_email(){
		$vin     = request()->vin; 
        $user_id = auth()->user()->id;        
        $report  = $this->generateReportAndSave($user_id, $vin, true);
        if(!$report['status'] && isset($report['status'])){
            return ['success' => false, 'message' => 'not found'];
        }
        try{
			 Mail::to(request()->email)->send(new SendReport($report));
			return ['success' => true, 'url' => $report->report_url]; 
        }catch(\Exception $e){
            return ['success' => false, 'message' => 'email error'];
        }
	}

    public function test_report(){
       
        $vin = request()->vin ?? "2GNALFEKSD6429325";
        return  $this->getAutoCheckReport($vin);
        return $this->generateNewNormalReport($vin, 328190);
    }

    public function viniReport($vin){
        $report = Reports::where('report_id', request()->vin)->firstOrFail();
        $html = $report->response;
        $html = str_replace('AutoCheck', 'Your', $html);
        $html = str_replace('My Elite Global', 'Your', $html);
        $html = str_replace('Experian Your Report', 'Experian Your Vehicle History Report', $html);
        $html = str_replace('www.autocheck.com/terms', '', $html);
        $html = str_replace('Your Score', 'Vehicle Score', $html);

       
        return $html;
    }
	
	
}
