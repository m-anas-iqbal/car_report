<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSession extends Model
{
	
	public $guarded = ['_token'];

 
}
