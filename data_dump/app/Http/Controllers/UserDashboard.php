<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use PHPHtmlParser\Dom;
use App\Models\User;
use App\Models\Receipt;
use App\Models\Reports;
use PDF;


class UserDashboard extends Controller
{
    public function login($value='')
    {
        //return  bcrypt('test');
    	return view('user.login');
    }

    public function loginAttempt($value='')
    {
    	if (Auth::attempt(['email' => request()->email, 'password' => request()->password, 'type' => 1])) {
            return redirect()->intended('/dashboard');
        } 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function dashboard($value='')
    {
    	return view('user.dashboard');
    }

    public function receipts($value='')
    {
    	return view('user.receipts')->with([
            'receipts'   =>  Receipt::latest()->get()
        ]);
    }

    public function receiptsShow($value='')
    {
    	# code...
    }

    public function reports($value='')
    {
    	return view('user.reports')->with([
            'reports'   =>  Reports::latest()->get()
        ]);
    }

    public function reportsShow($value='')
    {
    	# code...
    }

    public function generateReport($value='')
    {
    	return view('user.generate-report');
    }

    public function generateReportPost()
    {
		$vin = request()->vin; 
        $ch1 = curl_init();
        curl_setopt($ch1, CURLOPT_URL,"https://nmvtis.vehiclehistorydata.com/speical_api_new/preview/$vin");
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        $vin_data = curl_exec($ch1);
        curl_close ($ch1); 
        $data = json_decode($vin_data, true);  
        if($data['success'] == true){
            $report_id = $this->genrep(request()->vin);
            $report = new Reports;
            $report->user_id = auth()->user()->id;
            $report->report_id = $report_id;
            $report->report_url = 'uploads/'.$report_id.'.pdf';
            $report->vin = request()->vin;
            $report->save();
            auth()->user()->update([
                'credits'   =>  auth()->user()->credits - 1
            ]);
            return [
                'success'   =>  true,  
                'report_url' => $report->report_url,
                'user_remaining_credits'    =>  auth()->user()->credits
            ];
        }else{
            return ['success'   =>  false];
        }
    }


    public function changepassword($value='')
    {
        return view('user.changepassword');
    }

    public function changepasswordUpdate($value='')
    {
        if(Hash::check(request()->current_password, Auth::user()->password)){ 
            Auth::user()->update([
                'password'  => bcrypt(request()->input('new_password'))
            ]);
            return redirect()->back()->with(['success' => 'Your new password has been successfully updated!']);
        }
        return redirect()->back()->with('warning', 'Your current password is wrong!');
    }

    public function updatePassword($value='')
    {
        return request()->all();
    }

    public function profile($value='')
    {
        return view('user.updateprofile');
    }

    public function profileUpdate($value='')
    {
        auth()->user()->update([
            'name'  =>  request()->update_profile_name,
            'phone_number'  =>  request()->update_profile_phone,
        ]);
        return redirect()->back()->with('success', 'Your profile has been updated');
    }

    public function logout($value='')
    {
        auth()->logout();
        return redirect()->route('user.login');
    }


    public function genrep($vin)
    {
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
}
