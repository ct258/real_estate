<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckLogin
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
        // nếu user đã đăng nhập
        if (Auth::guard('account')->check()&&Auth::guard('account')->user()->hasRole('Customer')) {
        // if (Auth::guard('account')->user()->hasRole('Customer')) {
        //     dd(count(Auth::guard('account')->user()->load('customer')->customer));
            $user = Auth::user();
            // nếu level =1 (admin), status = 1 (actived) thì cho qua.
            // if ($user->level == 1 && $user->status == 1) {
            return $next($request);
        // } else {
                // Auth::logout();

                // return redirect()->route('getLogin');
            // }
        } else {
            // dd(\Request::server('HTTP_REFERER'));
            // dd($request);
            // dd(\Request::server('PATH_INFO'));
            // \Session::flash('request', $request->request);
            // \Session::flash('backUrl', \Request::fullUrl());
            \Session::flash('backUrl', \Request::server('HTTP_REFERER'));
            return redirect('/login');
        }
    }
}
