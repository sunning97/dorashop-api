<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            ['Xiaomi', 'xiaomi-logo.png'],
            ['Dell', 'dell-logo.png'],
            ['Samsung', 'samsung-logo.png'],
            ['OPPO', 'oppo-logo.png'],
            ['Nokia', 'Nokia-brand.jpg'],
            ['HP', 'hp-brand.png'],
            ['Sony', 'sony-brand.jpg'],
            ['Asus', 'asus-brand.jpg'],
            ['Apple', 'apple-logo-black.jpg'],
            ['Dong Hwa', ''],
            ['Huawei', 'huawei.jpg'],
            ['Gioneea', 'Gionee-new-logo-Make-Smiles.jpg'],
            ['Lenuo', 'lenuo-brand.jpg'],
            ['Lenovo', '597504-lenevo.jpg'],
            ['Razer', 'razer-brand.jpg'],
            ['LG', 'lg-electronics_416x416.jpg'],
            ['cutePAD', 'cutepad.jpg'],
            ['Sokany', 'sokany-brand.jpg'],
            ['PIONEGR', '5.jpg'],
            ['Oral-B', 'B0002KHTZ2_oralb_201305287_4627.jpg'],
            ['Duy Tân', 'duytan-7296.png'],
            ['Logitech', 'logitech-brand.jpg'],
            ['Panasonic', '3b0f01b696cd7a0336d2e7f11e5dd9b0.jpg'],
            ['SUNHOUSE', 'sunhouse.png'],
            ['Kangaroo', 'img000000005376.jpg'],
            ['Midea', 'Midea_logo_logotype-copy.png'],
            ['Philips', 'philips-logo-400x200.png'],
            ['Panasonic', '00000001556.png'],
            ['Acon', 'OZHbsPk4.jpeg'],
            ['BEURER', 'beurer.png'],
            ['OEM', 'default-logo.png'],
            ['Power Ionics', 'Power Ionics.png'],
            ['Bosch', '20110805_web_logos_bosch-519x346.jpg'],
            ['Pixar', 'default-logo.png'],
            ['Vivo', '1526696606.png'],
            ['Mobiistar', '1526733288.jpg'],
            ['MSI', '1526733633.png']
        ];

        foreach ($brands as $brand) {
            DB::table('brands')->insert([
                ['name' => $brand[0],'slug'=> str_slug($brand[0]),'description' => $brand[0],'logo'=> $brand[1],'created_at' => now()->toDateTimeString(),'updated_at'=>now()->toDateTimeString()]
            ]);
        }
    }
}
