<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PHPHtmlParser\Dom;

use App\Models\Setting; 

use Illuminate\Support\Facades\Mail;
use App\Mail\SendReport;

class SettingsController extends Controller
{
    
    public function settings(){
        return view('admin.settings')->with([
            'title' =>  'Settings',
			'setting'	=>	Setting::first()
        ]);
    }

    public function updateSettings(Request $request)
    {
		
		$setting = Setting::first();
    	if(request()->has('paypal')){
			$setting->update([
				'paypal'	=>	true
			]);
		}else{
			$setting->update([
				'paypal'	=>	false
			]);
		}
    	if(request()->has('stripe')){
			$setting->update([
				'stripe'	=>	true
			]);
		}else{
			$setting->update([
				'stripe'	=>	false
			]);
		}
		
		if(request()->has('authorizeNet')){
			$setting->update([
				'authorizeNet'	=>	true
			]);
		}else{
			$setting->update([
				'authorizeNet'	=>	false
			]);
		}
		
		if(request()->has('paytabs')){
			$setting->update([
				'paytabs'	=>	true
			]);
		}else{
			$setting->update([
				'paytabs'	=>	false
			]);
		}
		
		if(request()->has('paytabs_hosted')){
			$setting->update([
				'paytabs_hosted'	=>	true
			]);
		}else{
			$setting->update([
				'paytabs_hosted'	=>	false
			]);
		}
		
		if(request()->has('report_type_vini')){
			$setting->update([
				'report_type_vini'	=>	1
			]);
		}else{
			$setting->update([
				'report_type_vini'	=>	0
			]);
		}
		
		$setting->update([
			'report_type'	=>	$request->report_type
		]);
		
		
		return redirect()->route('admin.settings');
    }
	
	public function checkvin(){
		return view('admin.checkvin')->with([
			'title' =>  'Check VIN Number',
		]);
	}
	public function checkvinPost(){
		$vin  = request()->vin;
		$data = $this->getVinData($vin);  
		return [
			'Manufacturer' => @$data['Manufacturer'],
			'Make'         => @$data['Make'],
			'Model'        => @$data['Model'],
			'ModelYear'    => @$data['ModelYear'],
			'PlantCountry' => @$data['PlantCountry'],
			'VehicleType'  => @$data['VehicleType'],
			'ErrorCode'    => @$data['ErrorCode'],
			'success'      => true,
		];
		
	}

    
}
