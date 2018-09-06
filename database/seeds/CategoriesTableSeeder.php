<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

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
            'Thiết bị điện tử' => [
                'Điện thoại di động',
                'Hệ thống giải trí tại gia',
                'Laptop',
                'Máy ảnh & Máy quay phim',
                'Máy bay camera & Phụ kiện',
                'Máy in',
                'Máy tính bảng',
                'Máy tính để bàn',
                'Tivi'
            ],
            'Phụ kiện điện tử' => [
                'Phụ kiện máy tính',
                'Phụ kiện di động',
                'Thiết bị lưu trữ'
            ],
            'Thiết bị gia dụng' => [
                'Bàn ủi & Bàn ủi hơi nước',
                'Đồ gia dụng nhà bếp',
                'Máy giặt và sấy',
                'Vệ sinh sàn nhà & Hút bụi',
            ],
            'Chăm sóc sức khỏe, Làm đẹp' => [
                'Chăm sóc cá nhân',
                'Chăm sóc cho Nam giới',
                'Chăm sóc da mặt',
                'Nước hoa',
                'Thiết bị y tế'
            ],
            'Hàng Mẹ, Bé và Đồ chơi' => [
                'Đồ dùng bú sữa & ăn dặm',
                'Tã & Dụng cụ vệ sinh',
                'Tủ đứng ngăn kéo',
            ],
            'Siêu thị / Tạp hóa' => [
                'Đồ ăn sáng',
                'Đồ hộp & Thực phẩm đóng gói',
                'Kẹo & Socola',
            ],
            'Hàng Gia dụng và Đời sống' => [
                'Đèn',
                'Bếp & Phòng ăn',
            ],
            'Phụ Kiện Thời Trang' => [
                'Đồng hồ nữ',
                'Đồng hồ nam',
                'Mắt kính thời trang',
            ],
            'Thể thao, Du lịch' => [
                'Vali túi du lịch',
                'Hoạt động dã ngoại',
                'Phụ kiện',
            ],
            'Ôtô, Xe máy Thiết bị định vị' => [
                'Ăc quy & phụ kiện',
                'Chăm sóc ngoài ô tô',
                'Dầu nhớt ô tô',
                'Lốp & Mâm ô tô',
                'Đồ bảo hộ xe máy',
            ]
        ];

        foreach ($categories as $name => $category) {
            $cate = Category::create(
                ['name' => $name, 'slug' => str_slug($name), 'description' => $name, 'created_at' => now()->toDateTimeString(), 'updated_at' => now()->toDateTimeString()]);
            foreach ($category as $value){
                Category::insert(
                    ['name' => $value, 'slug' => str_slug($value), 'description' => $value,'parent_id'=>$cate->id, 'created_at' => now()->toDateTimeString(), 'updated_at' => now()->toDateTimeString()]
                );
            }
        }
    }
}
