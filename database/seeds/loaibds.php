<?php

use Illuminate\Database\Seeder;

class loaibds extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data1 = array(
            [
                'form_name' => 'Bán', ],
            [
                'form_name' => 'Cho thuê', ],
         );
        DB::table('form')->insert($data1);
        $data2 = array(
            [
                'form_id' => 1,
                'type_name' => 'căn hộ chung cư',
            ],
            [
                'form_id' => 1,
                'type_name' => 'nhà riêng',
            ],
            [
                'form_id' => 1,
                'type_name' => 'nhà biệt thự liền kề',
            ],
            [
                'form_id' => 1,
                'type_name' => 'nhà mặt phố',
            ],
            [
                'form_id' => 1,
                'type_name' => 'đất nền dự án',
            ],
            [
                'form_id' => 1,
                'type_name' => 'đất',
            ],
            [
                'form_id' => 1,
                'type_name' => 'trang trại, khu nghỉ dưỡng',
            ],
            [
                'form_id' => 1,
                'type_name' => 'kho, nhà xưởng',
            ],
            [
                'form_id' => 1,
                'type_name' => 'loại bất động sản khác',
            ],
            [
                'form_id' => 2,
                'type_name' => 'căn hộ chung cư',
            ],
            [
                'form_id' => 2,
                'type_name' => 'nhà riêng',
            ],
            [
                'form_id' => 2,
                'type_name' => 'nhà mặt phố',
            ],
            [
                'form_id' => 2,
                'type_name' => 'nhà trọ, phòng trọ',
            ],
            [
                'form_id' => 2,
                'type_name' => 'cửa hàng, ki ốt',
            ],
            [
                'form_id' => 2,
                'type_name' => 'kho, nhà xưởng, đất',
            ],
         );
        DB::table('type')->insert($data2);
    }
}
