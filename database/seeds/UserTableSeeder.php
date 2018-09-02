<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['f_name'=>'Giang','l_name'=>'Nguyễn','email'=>'mrcatbro97@gmail.com','password'=>bcrypt('password'),'address'=>'131/10 TCH18 ,Tân Chánh Hiệp ,Q12','phone'=>'0917381894','is_active' => 'T','created_at'=>now()->toDateTimeString(),'updated_at'=>now()->toDateTimeString()]
        ]);
    }
}
