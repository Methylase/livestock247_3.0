<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {


        if(Auth::check()){
            foreach($roles as $role){
                if ($request->user()->hasRole($role)) {
                    return $next($request);     
                }
            }
             
            return  redirect()->route('dashboard');
            
        }else{
            return  redirect()->route('login');
        }
    }
}
