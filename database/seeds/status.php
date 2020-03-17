<?php

use Illuminate\Database\Seeder;

class status extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('status')->insert([
            ['status_id' => 1, 'status_name' => 'Đang chờ thanh toán'],
            ['status_id' => 2, 'status_name' => 'Đang chờ duyệt'],
            ['status_id' => 3, 'status_name' => 'Đang hoạt động'],
            ['status_id' => 4, 'status_name' => 'Đang chờ gia hạn'],
            ['status_id' => 5, 'status_name' => 'Đang mua - bán'],
            ['status_id' => 6, 'status_name' => 'Đang đặt cọc'],
            ['status_id' => 7, 'status_name' => 'Đang công chứng'],
            ['status_id' => 8, 'status_name' => 'Đang sang tên'],
            ['status_id' => 9, 'status_name' => 'Đang đã bán'],
            ['status_id' => 10, 'status_name' => 'Hủy'],
        ]);
    }
}
