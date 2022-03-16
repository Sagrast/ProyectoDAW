<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        //Comproba que o Rol de usuario sexa 1 (Admin), de non ser así limitará o acceso.
        if (auth() == null || auth()->user() == null || Auth::user()->rol == 'admin'){
            return $next($request);
          } else {
            return back()->with('status',"No eres administrador!");
          }
    }
}
