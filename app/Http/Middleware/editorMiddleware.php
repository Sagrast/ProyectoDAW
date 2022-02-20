<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class editorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     *
     * Middleware encargado re restringir el acceso a la edición de noticias. El acceso está restringido al usuario administrador y a los comerciales de la empresa.
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->rol == 'admin' || Auth::user()->rol == 'comercial'){
            return $next($request);
          } else {
            return back()->with('status',"No tienes permiso de edicion!");
          }
    }
}
