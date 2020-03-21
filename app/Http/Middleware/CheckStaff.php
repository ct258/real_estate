<?php

namespace App\Http\Middleware;

use Closure;

class CheckStaff
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
        if (\Auth::guard('account')->check()) {
            
            $userRoles = \Auth::guard('account')->user()->hasRole('Staff');
            if(!$userRoles)
            {
                    return \redirect()->route('error');
                
            }
        }
        return $next($request);
    }
}
