<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Form;
use App\Models\FormTranslation;
use App\Models\Type;
use App\Models\TypeTranslation;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
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
        // dd($data);
        Schema::defaultStringLength(191);
    }
}
