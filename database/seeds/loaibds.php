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
            ['nhucau_ten' => 'Bán'],
            ['nhucau_ten' => 'Cho thuê'],
         );
        DB::table('nhucau')->insert($data1);
        $data2 = array(
            ['loaibds_ten' => 'căn hộ chung cư'],
            ['loaibds_ten' => 'nhà riêng'],
            ['loaibds_ten' => 'nhà biệt thự liền kề'],
            ['loaibds_ten' => 'nhà mặt phố'],
            ['loaibds_ten' => 'đất nền dự án'],
            ['loaibds_ten' => 'đất'],
            ['loaibds_ten' => 'trang trại, khu nghỉ dưỡng'],
            ['loaibds_ten' => 'kho, nhà xưởng'],
            ['loaibds_ten' => 'loại bất động sản khác'],
            ['loaibds_ten' => 'căn hộ chung cư'],
            ['loaibds_ten' => 'nhà riêng'],
            ['loaibds_ten' => 'nhà mặt phố'],
            ['loaibds_ten' => 'nhà trọ, phòng trọ'],
            ['loaibds_ten' => 'cửa hàng, ki ốt'],
            ['loaibds_ten' => 'kho, nhà xưởng, đất'],
         );
        DB::table('loaibds')->insert($data2);
    }
}
