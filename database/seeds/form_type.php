<?php

use Illuminate\Database\Seeder;

class form_type extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data1 = array(
            ['form_name' => 'Nhà đất bán'],
            ['form_name' => 'Nhà đất cho thuê'],
         );
        DB::table('form')->insert($data1);
        $data2 = array(
            [
                'form_id' => 1,
                'type_name' => 'Bán căn hộ chung cư',
            ],
            [
                'form_id' => 1,
                'type_name' => 'Bán nhà riêng',
            ],
            [
                'form_id' => 1,
                'type_name' => 'Bán nhà biệt thự liền kề',
            ],
            [
                'form_id' => 1,
                'type_name' => 'Bán nhà mặt phố',
            ],
            [
                'form_id' => 1,
                'type_name' => 'Bán đất nền dự án',
            ],
            [
                'form_id' => 1,
                'type_name' => 'Bán đất',
            ],
            [
                'form_id' => 1,
                'type_name' => 'Bán trang trại, khu nghỉ dưỡng',
            ],
            [
                'form_id' => 1,
                'type_name' => 'Bán kho, nhà xưởng',
            ],
            [
                'form_id' => 1,
                'type_name' => 'Bán loại bất động sản khác',
            ],
            [
                'form_id' => 2,
                'type_name' => 'Cho thuê căn hộ chung cư',
            ],
            [
                'form_id' => 2,
                'type_name' => 'Cho thuê nhà riêng',
            ],
            [
                'form_id' => 2,
                'type_name' => 'Cho thuê nhà mặt phố',
            ],
            [
                'form_id' => 2,
                'type_name' => 'Cho thuê nhà trọ, phòng trọ',
            ],
            [
                'form_id' => 2,
                'type_name' => 'Cho thuê cửa hàng, ki ốt',
            ],
            [
                'form_id' => 2,
                'type_name' => 'Cho thuê kho, nhà xưởng, đất',
            ],
            [
                'form_id' => 2,
                'type_name' => 'Cho thuê loại bất động sản khác',
            ],
         );
        DB::table('type')->insert($data2);
    }
}
