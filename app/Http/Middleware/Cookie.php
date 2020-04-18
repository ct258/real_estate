<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\CookieUser;
use App\Models\Form;
use App\Models\FormTranslation;
use App\Models\Type;
use App\Models\TypeTranslation;
use Illuminate\Support\Facades\View;
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
        $form=Form::join('form_translation','form.form_id','form_translation.form_id')
        ->where("form_translation_locale",\Session::get('lang', config('app.locale')))
        ->get();
        $type=Type::join('type_translation','type.type_id','type_translation.type_id')
        ->where("type_translation_locale",\Session::get('lang', config('app.locale')))
        ->get();
        $data = array(
            'form' => $form,
            'type' => $type,
        );
        View::share('data', $data);


        
        if(\Cookie::get('real_estate')==null || \Cookie::get('real_estate')==''){
            $id=CookieUser::insertGetId([]);
            \Cookie::queue('real_estate', $id, 43200);
            return redirect(\Request::url());
        }
        
        return $next($request);
    }
}