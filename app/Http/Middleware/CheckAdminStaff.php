<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdminStaff
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
            
            $userRoleAdmin = \Auth::guard('account')->user()->hasRole('Admin');
            $userRoleStaff = \Auth::guard('account')->user()->hasRole('Staff');
            if(!$userRoleAdmin&&!$userRoleStaff)
            {
                    return \redirect()->route('error');
                
            }
        }
        return $next($request);
    }
}
