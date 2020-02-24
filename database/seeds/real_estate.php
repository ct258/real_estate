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
            $data1 = array(
                'real_estate_id'             => $i,
                'real_estate_name_en'        => 'Governmental house for sale on street 53, Go Vap 1 ',
                'real_estate_name_vi'        => 'Chính chủ bán nhà đường 53, Gò Vấp 1 trệt 2 lầu 4*15m, 2 xe hơi tránh nhau',
                'real_estate_price'          => 6,
                'real_estate_price_total'    => 6000000000,
                'real_estate_address'        => 'Bán nhà riêng tại Đường 53 - Quận Gò Vấp - Hồ Chí Minh',
                'real_estate_acreage'        => 60,
                'real_estate_description_en' => '<p>T&ocirc;i b&aacute;n căn nh&agrave; ch&iacute;nh chủ, sổ đỏ, đ&oacute;ng thuế đầy đủ.<br />Nh&agrave; vu&ocirc;ng vức diện t&iacute;ch 60m2 (4*15m).<br />Kết cấu 1 trệt 2 lầu ki&ecirc;n cố gồm 1 ph&ograve;ng kh&aacute;ch, 4 ph&ograve;ng ngủ, 3WC, 1 s&acirc;n phơi. Xe hơi đậu được trong nh&agrave;.<br />Nội thất: Tủ bếp, tủ &acirc;m tường, tủ rượu,...<br />Nằm trong khu d&acirc;n tr&iacute; cao, an ninh, đường lớn, 2 xe hơi đi qua trước nh&agrave;.<br />Gi&aacute; b&aacute;n 6,3 tỷ thương lượng ch&uacute;t x&iacute;u lấy lộc.</p>',
                'real_estate_description_vi' => '<p>T&ocirc;i b&aacute;n căn nh&agrave; ch&iacute;nh chủ, sổ đỏ, đ&oacute;ng thuế đầy đủ.<br />Nh&agrave; vu&ocirc;ng vức diện t&iacute;ch 60m2 (4*15m).<br />Kết cấu 1 trệt 2 lầu ki&ecirc;n cố gồm 1 ph&ograve;ng kh&aacute;ch, 4 ph&ograve;ng ngủ, 3WC, 1 s&acirc;n phơi. Xe hơi đậu được trong nh&agrave;.<br />Nội thất: Tủ bếp, tủ &acirc;m tường, tủ rượu,...<br />Nằm trong khu d&acirc;n tr&iacute; cao, an ninh, đường lớn, 2 xe hơi đi qua trước nh&agrave;.<br />Gi&aacute; b&aacute;n 6,3 tỷ thương lượng ch&uacute;t x&iacute;u lấy lộc.</p>',
                'type_id'                    => 1,
                'street_id'                  => 1811,
                'district_id'                => 6,
                'unit_id'                    => 3,
                'status_id'                  => 1,
            );
            DB::table('real_estate')->insert($data1);

            $data2 = array(
                'real_estate_id' => $i,
                'image_id' => 2,
                'image_real_estate_note' => 'Avatar',
            );
            DB::table('image_real_estate')->insert($data2);

            for ($j = 3; $j <= 9; ++$j) {
                $data3 = array(
                    'real_estate_id' => $i,
                    'image_id' => $j,
                    'image_real_estate_note' => 'Image',
                );
                DB::table('image_real_estate')->insert($data3);
            }
        }
    }
}
