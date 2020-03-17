<?php

use Illuminate\Database\Seeder;

class form extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('form')->insert([
            ['form_id' => 1],
            ['form_id' => 2], ]);

        DB::table('form_translation')->insert([
            ['form_id' => 1,
            'form_translation_name'   => 'Nhà đất bán',
            'form_translation_locale' => 'vi',          ],
            ['form_id' => 2,
            'form_translation_name'   => 'Nhà đất cho thuê',
            'form_translation_locale' => 'vi',               ],
            ['form_id' => 1,
            'form_translation_name'   => 'Real estate for sale',
            'form_translation_locale' => 'en',                   ],
            ['form_id' => 2,
            'form_translation_name'   => 'Real estate for rent',
            'form_translation_locale' => 'en',                   ], ]);
    }
}
