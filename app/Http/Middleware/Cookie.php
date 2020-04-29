<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\CookieUser;
use App\Models\Form;
use App\Models\Banner;
use App\Models\FormTranslation;
use App\Models\Type;
use App\Models\TypeTranslation;
use Illuminate\Support\Facades\View;
use DB;
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
        $logo= DB::table('banner')->where('banner_id', \DB::raw("(select max(`banner_id`) from banner)"))->value('banner_title');

        // $logo = DB::table('banner')->where('banner_type', 'Logo')->get();

        // $logo = Banner::find(\DB::table('banner')->max('banner_id'));

        // dd($logo);
        View::share('data', $data);
        
        View::share('logo', $logo);

        

        if(\Cookie::get('real_estate')==null || \Cookie::get('real_estate')==''){
            $id=CookieUser::insertGetId([]);
            \Cookie::queue('real_estate', $id, 43200);
            return redirect(\Request::url());
        }
        
        return $next($request);
        
    }
}