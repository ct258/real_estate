<?php

use Illuminate\Database\Seeder;

class rank extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //Rank
        for ($i = 1; $i <= 5; ++$i) {
            DB::table('rank')->insert([
                'rank_id' => $i,
                'rank_level' => $i,
            ]);
        }
        //End rank
        //rank_translation
        DB::table('rank_translation')->insert([
            'rank_id' => 1,
            'rank_translation_name' => 'Khách hàng thân thiện',
            'rank_translation_description' => 'Khách hàng thân thiện',
            'rank_translation_locale' => 'vi',
        ]);
        DB::table('rank_translation')->insert([
            'rank_id' => 1,
            'rank_translation_name' => 'Friendly customer',
            'rank_translation_description' => 'Friendly customer',
            'rank_translation_locale' => 'en',
        ]);
        for ($i = 2; $i <= 5; ++$i) {
            DB::table('rank_translation')->insert([
                'rank_id' => $i,
                'rank_translation_name' => 'Khách hàng Vip'.($i - 1),
                'rank_translation_description' => 'Khách hàng Vip'.($i - 1),
                'rank_translation_locale' => 'vi',
            ]);
            DB::table('rank_translation')->insert([
                'rank_id' => $i,
                'rank_translation_name' => 'VIP'.($i - 1).' customer',
                'rank_translation_description' => 'VIP'.($i - 1).' customer',
                'rank_translation_locale' => 'en',
            ]);
        }
        // end rank
    }
}
