<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    use HasFactory;


    public function user($value='')
    {
    	return $this->belongsTo('App\Models\User', 'user_id');
    }
}
