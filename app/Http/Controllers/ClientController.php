<?php

namespace App\Http\Controllers;

use App\Models\RealEstate;
use App\Models\Form;
use App\Models\Province;
use App\Models\Direction;
use App\Models\RealEstateTranslation;
use App\Models\StandardAcreage;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ClientController extends Controller
{
    public function list(Request $request)
    {
        // dd(\Session::get('lang', config('app.locale')));
        app()->setLocale(\Session::get('lang', config('app.locale')));
        // \App::setLocale('vi');
        // $content = RealEstateTranslation::getTranslation('vi')->first();
        // dd($content);
        $real_estate = RealEstate::join('image_real_estate', 'real_estate.real_estate_id', 'image_real_estate.real_estate_id')
            ->join('real_estate_translation', 'real_estate.real_estate_id', 'real_estate_translation.real_estate_id')
            ->join('image', 'image_real_estate.image_id', 'image.image_id')
            ->join('district', 'real_estate.district_id', 'district.district_id')
            ->join('province', 'district.province_id', 'province.province_id')
            ->join('unit', 'real_estate.unit_id', 'unit.unit_id')
            ->join('unit_translation', 'unit_translation.unit_id', 'unit.unit_id')
            ->select('real_estate.real_estate_id',
            'translation_name',
            'translation_address',
            'translation_description',
            'real_estate_price',
            'real_estate_acreage',
            'real_estate.created_at',
            'unit_translation.unit_translation_name',
            'image.image_path',
            'province.province_name',
            'district.district_name')
            ->where([
                ['image_real_estate.image_real_estate_note', 'Avatar'],
                ['translation_locale', \Session::get('lang', config('app.locale'))],
                ['unit_translation_locale', \Session::get('lang', config('app.locale'))], ])
            // ->where('image_real_estate.image_real_estate_note', 'Avatar')
            // ->groupBy('real_estate.real_estate_id')
            ->paginate(5);
        // dd($real_estate);
        // tính thời gian đăng
        Carbon::setlocale('vi');
        $now = Carbon::now();
        foreach ($real_estate as $key => $value) {
            // dd($value['real_estate_id']);
            $day[$value['real_estate_id']] = $value->created_at->diffForHumans(($now));
        }
        // lấy dữ liệu cho search form
        $form = Form::join('form_translation', 'form.form_id', 'form_translation.form_id')
        ->select('form.form_id', 'form_translation_name')
        ->where('form_translation_locale', \Session::get('lang', config('app.locale')))
        ->get();
        $province = Province::select('province_id', 'province_name')->get();
        $standard_acreage = StandardAcreage::select('standard_acreage_id', 'standard_acreage_name', 'standard_acreage_value1', 'standard_acreage_value2')->get();

        return view('pages.user.feature.list', compact('real_estate', 'day', 'form', 'province', 'standard_acreage'));
    }

    //bỏ
    public function list_ajax(Request $request)
    {
        if ($request->ajax()) {
            $real_estate = RealEstate::join('image_real_estate', 'real_estate.real_estate_id', 'image_real_estate.real_estate_id')
            ->join('image', 'image_real_estate.image_id', 'image.image_id')
            ->join('district', 'real_estate.district_id', 'district.district_id')
            ->join('province', 'district.province_id', 'province.province_id')
            ->join('unit', 'real_estate.unit_id', 'unit.unit_id')
            ->select('real_estate.real_estate_id',
            'real_estate_name',
            'real_estate_description',
            'real_estate_price',
            'real_estate_acreage',
            'real_estate.created_at',
            'unit.unit_name_vi',
            'image.image_path',
            'province.province_name',
            'district.district_name')
            ->where('image_real_estate.image_real_estate_note', 'Avatar')
            ->paginate(5);

            // tính thời gian đăng
            Carbon::setlocale('vi');
            $now = Carbon::now();
            $day = $real_estate[0]->created_at->diffForHumans(($now));
            // if (Request::ajax()) {
            //     return Response::json(View::make('pages.user.feature.list_ajax', array('real_estate' => $real_estate))->render());
            // }

            echo json_encode($real_estate);

            // return view('pages.user.feature.list_ajax', compact('real_estate', 'day'));
        }
    }

    public function searchFullText(Request $request)
    {
        $real_estate = RealEstate::query();
        if ($request->search) {
            $real_estate = $real_estate->FullTextSearch($request->search);
        } else { //lọc
            if ($request->type) {
                $real_estate = $real_estate->where('real_estate.type_id', $request->type);
            }
            if ($request->district) {
                $real_estate = $real_estate->join('district', 'real_estate.district_id', 'district.district_id')
                ->where('real_estate.district_id', $request->district);
            }
            if ($request->ward) {
                $real_estate = $real_estate->join('ward', 'real_estate.ward_id', 'ward.ward_id')
                ->select('ward.ward_name')->where('real_estate.ward_id', $request->ward);
            }
            if ($request->street) {
                $real_estate = $real_estate->join('street', 'real_estate.street_id', 'street.street_id')
                ->select('street.street_name')->where('real_estate.street_id', $request->street);
            }
            if ($request->direction) {
                $real_estate = $real_estate->join('direction', 'real_estate.direction_id', 'direction.direction_id')
                ->select('direction.direction_name')->where('real_estate.direction_id', $request->direction);
            }
            if ($request->acreage) {
                $value_acreage[] = explode(',', $request->acreage);
                $real_estate = $real_estate->whereBetween('real_estate.real_estate_acreage', $value_acreage);
            }
            if ($request->price) {
                $value_price[] = explode(',', $request->price);
                $real_estate = $real_estate->whereBetween('real_estate.real_estate_price_total', $value_price);
            }
        }
        $real_estate = $real_estate
        // ->join('image_real_estate', 'real_estate.real_estate_id', 'image_real_estate.real_estate_id')
        // ->join('image', 'image_real_estate.image_id', 'image.image_id')
        // ->select('real_estate.real_estate_id',
        // 'real_estate_name_vi',
        // 'real_estate_description_vi',
        // 'real_estate_price',
        // 'real_estate_acreage',
        // 'real_estate.created_at',
        // 'image.image_path', )
        // ->paginate(5);
        ->join('image_real_estate', 'real_estate.real_estate_id', 'image_real_estate.real_estate_id')
        ->join('image', 'image_real_estate.image_id', 'image.image_id')
        ->join('district', 'real_estate.district_id', 'district.district_id')
        ->join('province', 'district.province_id', 'province.province_id')
        ->join('unit', 'real_estate.unit_id', 'unit.unit_id')
        ->select('real_estate.real_estate_id',
        'real_estate_name_vi',
        'real_estate_description_vi',
        'real_estate_price',
        'real_estate_acreage',
        'real_estate.created_at',
        'unit.unit_name_vi',
        'image.image_path',
        'province.province_name',
        'district.district_name')
        ->orWhereNotNull('image_real_estate.image_real_estate_note', 'Avatar')
        ->paginate(5);
        // dd($real_estate);
        // tính thời gian đăng
        Carbon::setlocale('vi');
        $now = Carbon::now();
        $day[] = '';
        foreach ($real_estate as $key => $value) {
            // dd($value['real_estate_id']);
            $day[$value['real_estate_id']] = $value->created_at->diffForHumans(($now));
        }

        // lấy dữ liệu cho search form
        $form = Form::select('form_id', 'form_name')->get();
        $province = Province::select('province_id', 'province_name')->get();
        $direction = Direction::select('direction_id', 'direction_name')->get();
        $standard_acreage = StandardAcreage::select('standard_acreage_id', 'standard_acreage_name', 'standard_acreage_value1', 'standard_acreage_value2')->get();

        return redirect('/list')
        ->with('real_estate', $real_estate)
        ->with('day', $day)
        ->with('form', $form)
        ->with('province', $province)
        ->with('direction', $direction)
        ->with('standard_acreage', $standard_acreage);
    }

    public function single_list(Request $request, $real_estate_id)
    {
        $real_estate = RealEstate::join('district', 'real_estate.district_id', 'district.district_id')
        ->join('real_estate_translation', 'real_estate.real_estate_id', 'real_estate_translation.real_estate_id')
        ->join('province', 'district.province_id', 'province.province_id')
        ->join('unit', 'real_estate.unit_id', 'unit.unit_id')
        ->join('unit_translation', 'unit_translation.unit_id', 'unit.unit_id')
        ->select('real_estate.real_estate_id',
        'translation_name',
        'translation_address',
        'translation_description',
        'real_estate_price',
        'real_estate_acreage',
        'real_estate.created_at',
        'unit_translation.unit_translation_name',
        'province.province_name',
        'district.district_name')
        ->where([
            ['real_estate.real_estate_id', $real_estate_id],
            ['translation_locale', \Session::get('lang', config('app.locale'))],
            ['unit_translation_locale', \Session::get('lang', config('app.locale'))], ])
        ->first();
        $image = RealEstate::join('image_real_estate', 'real_estate.real_estate_id', 'image_real_estate.real_estate_id')
        ->join('image', 'image_real_estate.image_id', 'image.image_id')
        ->select('image.image_path')
        ->where('real_estate.real_estate_id', $real_estate_id)
        ->get();
        // dd($real_estate);
        // dd($image);

        return view('pages.user.feature.single_list', compact('real_estate', 'image'));
    }

    public function add_to_cart(Request $request, $real_estate_id)
    {
        dd($request);
        if ($request->ajax()) {
        }
        if (Request::ajax()) {
            // return Response::json(View::make('pages.user.feature.list_ajax', array('real_estate' => $real_estate))->render());
        }
    }

    public function subscription(Request $request, $user)
    {
        dd($request);
    }
}
