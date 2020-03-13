<?php

namespace App\Http\Middleware;

use Closure;

class Currency
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // dd(\Session::get('currency'));
        if (!\Session::get('currency')) {
            session(['currency' => 'VND']);
        }
        // session(['currency' => 'VND']);
        // session()->put(['currency' => VND]);
        // \Session::push('currency', 'VND');
        if ($currency = $request->session()->get('currency')) {
            session(['currency' => $currency]);
            // \App::setLocale($currency);
        }

        return $next($request);
    }
}
