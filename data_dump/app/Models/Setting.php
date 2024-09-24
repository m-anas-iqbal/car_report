<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
	
	protected $fillable = [
		'paypal',
		'stripe',
		'authorizeNet',
		'paytabs',
		'paytabs_hosted',
		'report_type_vini',
		'report_type'
	];

 
}
