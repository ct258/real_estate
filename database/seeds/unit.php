<?php

use Illuminate\Database\Seeder;

class unit extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data1 = array(
            ['unit_name_vi' => 'Thỏa thuận',
            // 'unit_name_en' => 'Agreement',
            'unit_value' => 1,
            'form_id' => 1, ],
            ['unit_name_vi' => 'Triệu',
            // 'unit_name_en' => 'Million',
            'unit_value' => 1000000,
            'form_id' => 1, ],
            ['unit_name_vi' => 'Tỷ',
            // 'unit_name_en' => 'Billion',
            'unit_value' => 1000000000,
            'form_id' => 1, ],
            ['unit_name_vi' => 'Trăm nghìn/m2',
            // 'unit_name_en' => 'Hundred thousand/m2',
            'unit_value' => 100000,
            'form_id' => 1, ],
            ['unit_name_vi' => 'Triệu/m2',
            // 'unit_name_en' => 'Million/m2',
            'unit_value' => 1000000,
            'form_id' => 1, ],
            ['unit_name_vi' => 'Thỏa thuận',
            // 'unit_name_en' => 'Agreement',
            'unit_value' => 1,
            'form_id' => 2, ],
            ['unit_name_vi' => 'Trăm nghìn/tháng',
            // 'unit_name_en' => 'Hundred thousand/month',
            'unit_value' => 1000000,
            'form_id' => 2, ],
            ['unit_name_vi' => 'Triệu/tháng',
            // 'unit_name_en' => 'Million/month',
            'unit_value' => 1000000,
            'form_id' => 2, ],
            ['unit_name_vi' => 'Trăm nghìn/m2/tháng',
            // 'unit_name_en' => 'Hundred thousand/m2/month'',
            'unit_value' => 100000,
            'form_id' => 2, ],
            ['unit_name_vi' => 'Triệu/m2/tháng',
            // 'unit_name_en' => 'Million/m2/month',
            'unit_value' => 1000000,
            'form_id' => 2, ],
            ['unit_name_vi' => 'Nghìn/m2/tháng',
            // 'unit_name_en' => 'Thousand/m2/month',
            'unit_value' => 1000,
            'form_id' => 2, ],
         );
        DB::table('unit')->insert($data1);
    }
}
