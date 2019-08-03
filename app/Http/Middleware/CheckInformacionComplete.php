<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckInformacionComplete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $usuario = Auth::user();
        $trabajador = Auth::user()->getTrabajador();
        //$persona = $trabajador->persona();

        if ($trabajador->estado == 1){
            return redirect('/completeinformacion');
        }else{
            return $next($request);
        }

    }
}
