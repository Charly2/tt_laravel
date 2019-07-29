<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role='admin',...$roles)
    {

        //dd($role);
        if(Auth::user()->hasRole($role, $roles) ){
            return $next($request);
        }else{
            return redirect('/dashboard');
        }
    }
}
