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
                'real_estate_acreage' => 60,
                'type_id' => 1,
                'street_id' => 1811,
                'district_id' => 6,
                'unit_id' => 3,
                'real_estate_status' => 'Đang bán',
                'real_estate_avatar' => 'img/Product/2020-02-18202907_20200218122330-a871_wm.jpg',
            ]);
            DB::table('translation')->insert([
                'translation_name' => 'Governmental house for sale on street 53, Go Vap 1',
                'translation_address' => 'House for sale in Street 53 - District Go Vap - Ho Chi Minh',
                'translation_description' => '<p>I sell the main house, red book, pay full tax.<br />
                Square house with an area of 60m2 (4 * 15m).<br />
                Structure 1 ground 2 floors solid including 1 living room, 4 bedrooms, 3WC, 1 drying yard. Cars can park in the house.<br />
                Interior: Kitchen cabinets, cupboards, wine cabinets, ...<br />
                Located in a high population, security, big roads, 2 cars passing in front of the house.<br />
                Selling price of 6.3 billion negotiable little get fortune.</p>',
                'translation_locale' => 'en',
                'real_estate_id' => $i,
            ]);
            DB::table('translation')->insert([
                'translation_name' => 'Chính chủ bán nhà đường 53, Gò Vấp 1 trệt 2 lầu 4*15m, 2 xe hơi tránh nhau',
                'translation_address' => 'Bán nhà riêng tại Đường 53 - Quận Gò Vấp - Hồ Chí Minh',
                'translation_description' => '<p>T&ocirc;i b&aacute;n căn nh&agrave; ch&iacute;nh chủ, sổ đỏ, đ&oacute;ng thuế đầy đủ.<br />Nh&agrave; vu&ocirc;ng vức diện t&iacute;ch 60m2 (4*15m).<br />Kết cấu 1 trệt 2 lầu ki&ecirc;n cố gồm 1 ph&ograve;ng kh&aacute;ch, 4 ph&ograve;ng ngủ, 3WC, 1 s&acirc;n phơi. Xe hơi đậu được trong nh&agrave;.<br />Nội thất: Tủ bếp, tủ &acirc;m tường, tủ rượu,...<br />Nằm trong khu d&acirc;n tr&iacute; cao, an ninh, đường lớn, 2 xe hơi đi qua trước nh&agrave;.<br />Gi&aacute; b&aacute;n 6,3 tỷ thương lượng ch&uacute;t x&iacute;u lấy lộc.</p>',
                'translation_locale' => 'vi',
                'real_estate_id' => $i,
            ]);


            for ($j = 2; $j <= 4; ++$j) {
                DB::table('image')->insert([[
                    'real_estate_id' => $i,
                    'image_path' => 'img/Product/20200218122336-5722_wm.jpg',
                ],[
                    'real_estate_id' => $i,
                    'image_path' => 'img/Product/20200218122336-a28e_wm.jpg',
                ],[
                    'real_estate_id' => $i,
                    'image_path' => 'img/Product/20200218122336-a078_wm.jpg',
                ]]);
            }
        }
    }
}
