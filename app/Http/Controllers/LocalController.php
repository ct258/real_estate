<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Ward;
use App\Models\Street;

class LocalController extends Controller
{
    public function get_district($district_id)
    {
        $district = District ::select('district_id', 'district_name')->where('district_id', $ttp_id)->orderBy('qh_ten', 'asc')->get();

        echo "<option value=''>-- Chọn Quận/Huyện --</option>";

        foreach ($district as $item) {
            echo "<option value='".$item->district_id."'>".$item->district_name.'</option>';
        }
    }

    public function get_ward($province_id, $district_id)
    {
        $ward = Ward::select('ward_id', 'ward_name')
        ->where([
            ['province_id', $province_id],
            ['district_id', $district_id], ])
        ->orderBy('ward_name', 'asc')->get();
        echo "<option value=''>-- Chọn Phường/Xã --</option>";
        foreach ($ward as $item) {
            echo "<option value='".$item->ward_id."'>".$item->ward_name.'</option>';
        }
    }

    public function get_street_1($province_id)
    {
        $street = Street::select('street_id', 'street_name')
        ->where('province_id', $province_id)
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
}
