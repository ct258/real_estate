<?php

namespace App\Http\Middleware;

use Closure;

class CheckCustomer
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
        if(\Auth::guard('account')->check()){
            $admin=\Auth::guard('account')->user()->hasRole('Admin');
            $staff=\Auth::guard('account')->user()->hasRole('Staff');
            if (!$admin && !$staff) {
                
                return $next($request);
            }
            else{
                \Session::flash('backUrl', \Request::server('HTTP_REFERER'));
                return redirect('/login');
            }
        }else{
            return $next($request);
        }
    }
}
