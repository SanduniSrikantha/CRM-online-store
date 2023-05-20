<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check()){
            return redirect('/login'); //redirect unauthorised users to login 
        }

        $user=Auth::user();
        if($user->role==1){
            return $next($request);
        }

        if($user->role==2){
            return redirect('/customer');
        }

        //return $next($request);
    }
}
