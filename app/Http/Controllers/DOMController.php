<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Ward;
use App\Models\Street;
use App\Models\Type;
use App\Models\Unit;
use App\Models\StandardAcreage;
use App\Models\StandardPrice;

class DOMController extends Controller
{
    public function get_district($province_id)
    {
        $district = District ::select('district_id', 'district_name')->where('province_id', $province_id)->orderBy('district_name', 'asc')->get();

        echo "<option value=''>-- Chọn Quận/Huyện --</option>";

        foreach ($district as $item) {
            echo "<option value='".$item->district_id."'>".$item->district_name.'</option>';
        }
    }

    public function get_ward($district_id)
    {
        $ward = Ward::select('ward_id', 'ward_name')
        ->where('district_id', $district_id)
        ->orderBy('ward_name', 'asc')->get();
        echo "<option value=''>-- Chọn Phường/Xã --</option>";
        foreach ($ward as $item) {
            echo "<option value='".$item->ward_id."'>".$item->ward_name.'</option>';
        }
    }

    public function get_street_1($district_id)
    {
        $street = Street::select('street_id', 'street_name')
        ->where('district_id', $district_id)
        ->orderBy('street_name', 'asc')->get();

        echo "<option value=''>-- Chọn Đường/Phố --</option>";

        foreach ($street as $item) {
            echo "<option value='".$item->street_id."'>".$item->street_name.'</option>';
        }
    }

    public function get_street_2($province_id, $district_id)
    {
        $street = Street::select('street_id', 'street_name')
        ->where([
            ['province_id', $province_id],
            ['district_id', $district_id], ])
        ->orderBy('street_name', 'asc')->get();

        echo "<option value=''>-- Chọn Đường/Phố --</option>";

        foreach ($street as $item) {
            echo "<option value='".$item->street_id."'>".$item->street_name.'</option>';
        }
    }

    public function get_type($form_id)
    {
        $type = Type::join('type_translation','type.type_id','type_translation.type_id')
        ->select('type.type_id', 'type_translation_name')
        ->where([
            ["type_translation_locale",\Session::get('lang', config('app.locale'))],
            ['form_id',$form_id]
            ])
        ->get();

        foreach ($type as $item) {
            echo "<option value='".$item->type_id."'>".$item->type_translation_name.'</option>';
        }
    }

    public function get_unit($form_id)
    {
        $unit = Unit::join('unit_translation','unit.unit_id','unit_translation.unit_id')
        ->select('unit.unit_id', 'unit_translation_name')
        ->where([
            ["unit_translation_locale",\Session::get('lang', config('app.locale'))],
            ['unit.form_id',$form_id]
            ])
        ->get();
        foreach ($unit as $item) {
            echo "<option value='".$item->unit_id."'>".$item->unit_translation_name.'</option>';
        }
    }

    // public function get_acreage($form_id)
    // {
    //     $standard_acreage = StandardAcreage::select('standard_acreage_id', 'standard_acreage_name', 'standard_acreage_value1', 'standard_acreage_value2')
    //     ->where('form_id', $form_id)->get();
    //     foreach ($standard_acreage as $item) {
    //         echo "<option value='{`acreage`:[".$item->standard_acreage_value1.','.$item->standard_acreage_value2."]}'>".$item->standard_acreage_name.'</option>';
    //     }
    // }

    public function get_price($form_id)
    {
        $standard_price = StandardPrice::select('standard_price_id', 'standard_price_name', 'standard_price_value1', 'standard_price_value2')
        ->where('form_id', $form_id)->get();
        echo "<option value=''>-- Chọn Giá --</option>";
        foreach ($standard_price as $item) {
            echo '<option value='.$item->standard_price_value1.','.$item->standard_price_value2.'>'.$item->standard_price_name.'</option>';
        }
    }
}
