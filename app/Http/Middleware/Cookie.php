<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\CookieUser;

class Cookie
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
if(\Cookie::get('real_estate')==null){
    $id=CookieUser::insertGetId([]);
    \Cookie::queue('real_estate', $id, 43200);
}
        return $next($request);

    }
}
