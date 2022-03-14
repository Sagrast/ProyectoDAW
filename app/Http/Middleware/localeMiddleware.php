<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class localeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     *
     * Metodo que comprueba que exista una cookie 'locale' y establece el idioma de la APP al valor de la cookie
     */
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->cookie('locale',app()->getLocale());
        app()->setLocale($locale);
        return $next($request);
    }
}
