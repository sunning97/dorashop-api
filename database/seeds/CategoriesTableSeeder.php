<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        $categories = [
            'Thiết bị điện tử',
            'Phụ kiện điện tử',
            'Thiết bị gia dụng',
            'Chăm sóc sức khỏe, Làm đẹp',
            'Hàng Mẹ, Bé và Đồ chơi',
            'Siêu thị / Tạp hóa',
            'Hàng Gia dụng và Đời sống',
            'Phụ Kiện Thời Trang',
            'Thể thao, Du lịch',
            'Ôtô, Xe máy Thiết bị định vị'
        ];

        foreach ($categories as $category){
            DB::table('categories')->insert([
                ['name'=>$category,'slug'=> str_slug($category),'description'=> $category,'created_at'=>now()->toDateTimeString(),'updated_at'=> now()->toDateTimeString()]
            ]);
        }
    }
}
