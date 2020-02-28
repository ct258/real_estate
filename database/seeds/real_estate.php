<?php

use Illuminate\Database\Seeder;

class real_estate extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i = 1; $i <= 10; ++$i) {
            DB::table('real_estate')->insert([
                'real_estate_id' => $i,
                'real_estate_price' => 6000000000,
                'real_estate_address' => 'Bán nhà riêng tại Đường 53 - Quận Gò Vấp - Hồ Chí Minh',
                'real_estate_acreage' => 60,
                'type_id' => 1,
                'street_id' => 1811,
                'district_id' => 6,
                'unit_id' => 3,
                'status_id' => 1,
            ]);
            DB::table('real_estate_translation')->insert([
                'translation_name' => 'Governmental house for sale on street 53, Go Vap 1',
                'translation_description' => '<p>T&ocirc;i b&aacute;n căn nh&agrave; ch&iacute;nh chủ, sổ đỏ, đ&oacute;ng thuế đầy đủ.<br />Nh&agrave; vu&ocirc;ng vức diện t&iacute;ch 60m2 (4*15m).<br />Kết cấu 1 trệt 2 lầu ki&ecirc;n cố gồm 1 ph&ograve;ng kh&aacute;ch, 4 ph&ograve;ng ngủ, 3WC, 1 s&acirc;n phơi. Xe hơi đậu được trong nh&agrave;.<br />Nội thất: Tủ bếp, tủ &acirc;m tường, tủ rượu,...<br />Nằm trong khu d&acirc;n tr&iacute; cao, an ninh, đường lớn, 2 xe hơi đi qua trước nh&agrave;.<br />Gi&aacute; b&aacute;n 6,3 tỷ thương lượng ch&uacute;t x&iacute;u lấy lộc.</p>',
                'translation_locale' => 'en',
                'real_estate_id' => $i,
            ]);
            DB::table('real_estate_translation')->insert([
                'translation_name' => 'Chính chủ bán nhà đường 53, Gò Vấp 1 trệt 2 lầu 4*15m, 2 xe hơi tránh nhau',
                'translation_description' => '<p>T&ocirc;i b&aacute;n căn nh&agrave; ch&iacute;nh chủ, sổ đỏ, đ&oacute;ng thuế đầy đủ.<br />Nh&agrave; vu&ocirc;ng vức diện t&iacute;ch 60m2 (4*15m).<br />Kết cấu 1 trệt 2 lầu ki&ecirc;n cố gồm 1 ph&ograve;ng kh&aacute;ch, 4 ph&ograve;ng ngủ, 3WC, 1 s&acirc;n phơi. Xe hơi đậu được trong nh&agrave;.<br />Nội thất: Tủ bếp, tủ &acirc;m tường, tủ rượu,...<br />Nằm trong khu d&acirc;n tr&iacute; cao, an ninh, đường lớn, 2 xe hơi đi qua trước nh&agrave;.<br />Gi&aacute; b&aacute;n 6,3 tỷ thương lượng ch&uacute;t x&iacute;u lấy lộc.</p>',
                'translation_locale' => 'vi',
                'real_estate_id' => $i,
            ]);
            DB::table('image_real_estate')->insert([
                'real_estate_id' => $i,
                'image_id' => 2,
                'image_real_estate_note' => 'Avatar',
            ]);

            for ($j = 3; $j <= 9; ++$j) {
                DB::table('image_real_estate')->insert([
                    'real_estate_id' => $i,
                    'image_id' => $j,
                    'image_real_estate_note' => 'Image',
                ]);
            }
        }
    }
}
