<?php

use Illuminate\Database\Seeder;

class status extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data1 = array(
            ['status_id' => 1, 'status_name' => 'Đang chờ duyệt'],
            ['status_id' => 2, 'status_name' => 'Đang đăng '],
            ['status_id' => 3, 'status_name' => 'Đã bán'],
         );
        DB::table('status')->insert($data1);
    }
}
