<?php

use Illuminate\Database\Seeder;

class unit extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data1 = array(
            ['unit_name' => 'Thỏa thuận',
            'form_id' => 1, ],
            ['unit_name' => 'Triệu',
            'form_id' => 1, ],
            ['unit_name' => 'Tỷ',
            'form_id' => 1, ],
            ['unit_name' => 'Trăm nghìn/m2',
            'form_id' => 1, ],
            ['unit_name' => 'Triệu/m2',
            'form_id' => 1, ],
            ['unit_name' => 'Thỏa thuận',
            'form_id' => 2, ],
            ['unit_name' => 'Trăm nghìn/tháng',
            'form_id' => 2, ],
            ['unit_name' => 'Triệu thàng',
            'form_id' => 2, ],
            ['unit_name' => 'Trăm nghìn/m2/tháng',
            'form_id' => 2, ],
            ['unit_name' => 'Triệu/m2/tháng',
            'form_id' => 2, ],
            ['unit_name' => 'Nghìn/m2/tháng',
            'form_id' => 2, ],
         );
        DB::table('unit')->insert($data1);
    }
}
