<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;
	
	protected $fillable = ['payment_status', 'transaction_id'];

    public function user($value='')
    {
    	return $this->belongsTo('App\Models\User', 'user_id');
    }
}
