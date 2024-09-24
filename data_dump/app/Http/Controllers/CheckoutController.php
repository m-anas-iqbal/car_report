<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Receipt;
use App\Models\Reports;

use PDF;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendReport;

class CheckoutController extends Controller
{
	public function vwpsuccess(){
		$receipt = Receipt::where('order_id',request()->s)->firstOrFail();			
		
		$receipt->update([
			'payment_status'	=>	'succeeded',
			'transaction_id'	=>	request()->t
		]);
		
		if($receipt->receipt_type == 'vin_report')
		{
			$this->addPackage($receipt->user_id, $receipt->package);
			$report_id = $this->report_show($receipt->vin);
            $report = new Reports;
            $report->user_id = $receipt->user_id;
            $report->report_id = $report_id;
            $report->report_url = 'uploads/'.$report_id.'.pdf';
            $report->vin = $receipt->vin;
            $report->save();
			
			$user = User::findOrFail($receipt->user_id);

            Mail::to($user->email)->send(new SendReport($report));
			
			$user->update([
                'credits'   =>  $user->credits - 1
            ]);

            //return ['success' => true, 'report_id' =>$report->report_id];
			
			return redirect()->route('finish_order', $report->report_id);
			
		}else{
			$this->addPackage($receipt->user_id, $receipt->package);
			return redirect()->route('finish_package_order', $receipt->id);
		}
	}
	
	public function vwpfailure(){
		$receipt = Receipt::where('order_id',request()->s)->firstOrFail();
		
		$receipt->update([
			'payment_status'	=>	'failed',
			'transaction_id'	=>	request()->t
		]);
		
		return redirect()->route('payment_failed', $receipt->order_id);
	}
	
	public function payment_failed($order_id){
		
		$receipt = Receipt::where('order_id',$order_id)->firstOrFail();
		
		return view('checkout.order_failed')->with([
			'receipt'	=> $receipt
		]);
	}
	
	public function initpayment($value='')
    {
		//return request()->data['name'];
		//return request()->price * 100;
		if(auth()->check()){
            $userid = auth()->user()->id;
        }else{
            $userid =  $this->checkUser(request()->data['email']);    
        }
		
		$user = User::find($userid);
		//return $user;
		
		$name = $user->name;
		$email = $user->email;
    	$curl = curl_init();
		
		$data = json_encode([
			'fullName' 		=>  $name,
			'email' 		=>  $email,
			'amount' 		=> request()->price * 100,
			'customerTrns'	=>	'VIN Report Purchase',
			'requestLang'	=>	'en-US',
			//'sourceCode'	=>	'7226'			
			'sourceCode'	=>	'6173'			
		]);		
		//return $data;

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://www.vivapayments.com/api/orders',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS =>$data,
		  CURLOPT_HTTPHEADER => array(
			'Content-Type: application/json',
			'Authorization: Basic ODhkZThkM2YtMzg0NS00YjllLTkzYjktMDIxMWQ0NWY3NTgyOllmR3IyNjFHOGNSMDlwcjk1TU8zQnB3SHhpZjNaRw=='
			//'Authorization: Basic ZTk1MmQxYzgtNjdmYi00ZTAyLTlmODAtNWZjMjk1MTEzYTg5OkZiaVhQJA=='
		  ),
		));
		$response = curl_exec($curl);
		curl_close($curl);
		
		$receipt = new Receipt;
        $receipt->user_id  = $userid;
        $receipt->payment_method  = 'VivaWallet';
        $receipt->order_id  = json_decode($response)->OrderCode;
        $receipt->transaction_id  = '';
        $receipt->currency_code  = 'GBP';
        $receipt->amount  = request()->price ;
        $receipt->payment_status  = 'pending';
        $receipt->package  = request()->package;
        $receipt->vin  = isset(request()->data['vin'])? request()->data['vin'] : null;
		$receipt->receipt_type  = request()->data['type'];
        $receipt->save();
		
		echo $response;
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
	
	public function checkUser($email){
        $user  = User::where('email', $email)->first(); 
        if(!$user){
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
	}*/
	
	public function report_show($vin){
         $api_key = "146d9c721ae437709dee33423d6024079d65087b43bc217b984a7b0ede41170e";
         $report_id = rand(000000,999999);
         $ch1 = curl_init(); 
        // curl_setopt($ch1, CURLOPT_URL,"https://nmvtis.vehiclehistorydata.com/api/extended/$vin?&api_key=$api_key");
         curl_setopt($ch1, CURLOPT_URL,"https://nmvtis.vehiclehistorydata.com/speical_api_new/api/$vin"); 
         curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
         $vin_data = curl_exec($ch1);
         curl_close ($ch1); 
		 $data = json_decode($vin_data, true);   
         //$preview  = json_decode($vin_data)->preview; 
		//return $data['recalls'];
		
        $data = [
            'vindata'   =>  $data['result'],
            'recalldata'=>  $data['recalls'],
            'engine'    =>  $data['engine'],
            'report_id' =>  $report_id,
            'vehicle'   =>  $data['title'], 
        ];
            // return view('report_show')->with([
            //     'vindata'   =>  $vinresults,
            //     'recalldata'=> $recalldata,
            //     'engine'    =>  $engine
            // ]);
        //return view('report_show', $data);
        // $pdf = PDF::loadView('report_show', $data);
        // $pdf->save('uploads/'.$report_id.'.pdf');
        $pdf = PDF::loadView('report_show', $data);
        //return $pdf->stream('document.pdf');
		$pdf->save('uploads/'.$report_id.'.pdf');
		return $report_id; 
    }
	
	
	public function pppverific(){
		return request()->all();
		//$order_id =  $_COOKIE["order_id"];
		$order_id =  request()->invoice;
		 
		$receipt = Receipt::where('order_id',json_decode($order_id))->firstOrFail();	
		$receipt->update([
			'payment_status'	=>	request()->payment_status,
			'transaction_id'	=>	request()->txn_id
		]);
		
		if($receipt->receipt_type == 'vin_report')
		{
			$this->addPackage($receipt->user_id, $receipt->package);
			$report_id = $this->report_show($receipt->vin);
            $report = new Reports;
            $report->user_id = $receipt->user_id;
            $report->report_id = $report_id;
            $report->report_url = 'uploads/'.$report_id.'.pdf';
            $report->vin = $receipt->vin;
            $report->save();
			
			$user = User::findOrFail($receipt->user_id);

            Mail::to($user->email)->send(new SendReport($report));
			
			$user->update([
                'credits'   =>  $user->credits - 1
            ]);

            //return ['success' => true, 'report_id' =>$report->report_id];
			
			return redirect()->route('finish_order', $report->report_id);
			
		}else{
			$this->addPackage($receipt->user_id, $receipt->package);
			return redirect()->route('finish_package_order', $receipt->id);
		}
		
		/*$userid = '';
		$vin = '';
		$order_type = 'package_purchase';
		if(auth()->check()){
            $userid = auth()->user()->id;	
			$order_type = json_decode($_COOKIE["order_data"])->type;			
        }else{
            if(isset($_COOKIE["order_data"])){
				$email = json_decode($_COOKIE["order_data"])->email;
				$order_type = json_decode($_COOKIE["order_data"])->type;
				//$userid =  $this->checkUser($email);   
				$user  = User::where('email', $email)->first(); 
				if(!$user){
					$user  =  User::create([
						'name'  =>  json_decode($_COOKIE["order_data"])->name,
						'email'  =>  json_decode($_COOKIE["order_data"])->email,
						'password'  =>  bcrypt(json_decode($_COOKIE["order_data"])->password),
						'phone_number'  =>  json_decode($_COOKIE["order_data"])->phone,
						'credits'  =>  0,
					]);
				}
				$userid = $user->id;
			}
        }
		 
		
		$receipt = new Receipt;
        $receipt->user_id  = $userid;
        $receipt->payment_method  = 'PayPal';
        $receipt->order_id  = rand(000000,999999);
        $receipt->transaction_id  = request()->txn_id;
        $receipt->currency_code  = request()->mc_currency;
        $receipt->amount  = request()->amt ;
        $receipt->payment_status  = request()->payment_status;
        $receipt->package  = request()->item_number;
        $receipt->vin  = $vin;
		$receipt->receipt_type  = $order_type;
        $receipt->save();
		
		
		
		$this->addPackage($receipt->user_id, $receipt->package);
		$user = User::findOrFail($receipt->user_id);
			
			$user->update([
                'credits'   =>  $user->credits - 1
            ]);
			if($order_type == 'vin_report'){
				$report_id = $this->report_show($receipt->vin);
				$report = new Reports;
				$report->user_id = $receipt->user_id;
				$report->report_id = $report_id;
				$report->report_url = 'uploads/'.$report_id.'.pdf';
				$report->vin = json_decode($_COOKIE["order_data"])->vin;
				$report->save();
				Mail::to($user->email)->send(new SendReport($report));
				return redirect()->route('finish_order', $report->report_id);
			}else{
				$this->addPackage($receipt->user_id, $receipt->package);
				return redirect()->route('finish_package_order', $receipt->id);
			}
		

            //return ['success' => true, 'report_id' =>$report->report_id];
			
			
		
		return '';
		return request()->all();
		
		*/
	}
	
	public function initpppayment(){
		 
		if(auth()->check()){
            $userid = auth()->user()->id;
        }else{
            $userid =  $this->checkUser(request()->data['email']);    
        }
		
		$user = User::find($userid);
		
		$name = $user->name;
		$email = $user->email;
		//return '123456';
		$receipt = new Receipt;
        $receipt->user_id  = $userid;
        $receipt->payment_method  = 'PayPal';
        $receipt->order_id  = rand(000000,999999);
        $receipt->transaction_id  = '';
        $receipt->currency_code  = 'USD';
        $receipt->amount  = request()->price ;
        $receipt->payment_status  = 'pending';
        $receipt->package  = request()->package;
        $receipt->vin  = isset(request()->data['vin'])? request()->data['vin'] : null;
		$receipt->receipt_type  = request()->data['type'];
        $receipt->save();
		
		return $receipt->order_id;
	}
	
	public function test_paypal_payments(){
		return view('checkout.paypal_buttons_test');
	}
	public function transaction_complete(){
		//return request()->invoice;
		$order_id =  request()->invoice;
		if($order_id){
			$receipt = Receipt::where('order_id',json_decode($order_id))->firstOrFail();
			$receipt->update([
				'payment_status'	=>	request()->payment_status,
				'transaction_id'	=>	request()->txn_id
			]);		
			//return $receipt;
			//return view('checkout.transactioncomplete');
			if($receipt->receipt_type == 'vin_report')
			{
				$this->addPackage($receipt->user_id, $receipt->package);
				$report_id = $this->report_show($receipt->vin);
				$report = new Reports;
				$report->user_id = $receipt->user_id;
				$report->report_id = $report_id;
				$report->report_url = 'uploads/'.$report_id.'.pdf';
				$report->vin = $receipt->vin;
				$report->save();
				
				$user = User::findOrFail($receipt->user_id);

				Mail::to($user->email)->send(new SendReport($report));
				
				$user->update([
					'credits'   =>  $user->credits - 1
				]);

				//return ['success' => true, 'report_id' =>$report->report_id];
				
				return redirect()->route('finish_order', $report->report_id);
				
			}else{
				$this->addPackage($receipt->user_id, $receipt->package);
				return redirect()->route('finish_package_order', $receipt->id);
			}
		}else{
			return view('checkout.transactioncomplete');
		}
		 
		
	}
}