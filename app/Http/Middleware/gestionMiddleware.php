<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class gestionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //Comprueba que el usuario autentificado sea administrador o empleado para poder entrar en la parte de gestión.
        if (Auth::user()->rol == 'admin' || Auth::user()->rol == 'empleado'){
            return $next($request);
          } else {
            return back()->with('status',"No tienes permiso para entrar en este página");
          }
    }
}
