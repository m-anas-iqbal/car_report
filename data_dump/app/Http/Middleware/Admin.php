<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Contracts\Auth\Guard;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle(Request $request, Closure $next)
    {
        //return ; 
        if($this->auth->guest()){
            if($request->ajax()){
                return response('Unauthorized.', 401);
            }else{
                $this->auth->logout();
                return redirect()->guest('/admin/login');
                //echo 'test';
            }
        }else{
            return $next($request);
        }
    }
}
