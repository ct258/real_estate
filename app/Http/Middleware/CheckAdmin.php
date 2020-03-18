<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
class CheckAdmin
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
        if (Auth::guard('account')->check()) {
            
            $userRoles = Auth::guard('account')->user()->hasRole('Admin');
            if(!$userRoles)
            {
                    return \redirect()->route('error');
                
            }
        }
        return $next($request);
    }
}
