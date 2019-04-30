<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('products')->truncate();

      DB::table('products')->insert([
        'name' => 'Thịt 3 chỉ',
        'price' => 100000,
        'image' => 'lon1.jpg',
        'description' => 'Thịt heo là thịt từ con heo, là một loại thực phẩm rất phổ biến trên thế giới, tiêu thụ thịt heo của người Việt chiếm tới 73,3%, thịt gia cầm là 17,5% và chỉ 9,2% còn lại là thịt các loại (thịt bò, thịt trâu, thịt dê...), điều này xuất phát từ truyền thống ẩm thực của người Việt thường ăn thịt heo và thịt gà nhiều hơn các loại thịt khác',
        'discount' => rand(0,1)/10,
        'type' => 0
      ]);

      DB::table('products')->insert([
        'name' => 'Thịt bắp giò',
        'price' => 150000,
        'image' => 'lon2.jpg',
        'description' => 'Thịt heo là thịt từ con heo, là một loại thực phẩm rất phổ biến trên thế giới, tiêu thụ thịt heo của người Việt chiếm tới 73,3%, thịt gia cầm là 17,5% và chỉ 9,2% còn lại là thịt các loại (thịt bò, thịt trâu, thịt dê...), điều này xuất phát từ truyền thống ẩm thực của người Việt thường ăn thịt heo và thịt gà nhiều hơn các loại thịt khác',
        'discount' => rand(0,1)/10,
        'type' => 0
      ]);

      DB::table('products')->insert([
        'name' => 'Thịt mông',
        'price' => 120000,
        'image' => 'lon3.jpg',
        'description' => 'Thịt heo là thịt từ con heo, là một loại thực phẩm rất phổ biến trên thế giới, tiêu thụ thịt heo của người Việt chiếm tới 73,3%, thịt gia cầm là 17,5% và chỉ 9,2% còn lại là thịt các loại (thịt bò, thịt trâu, thịt dê...), điều này xuất phát từ truyền thống ẩm thực của người Việt thường ăn thịt heo và thịt gà nhiều hơn các loại thịt khác',
        'discount' => rand(0,1)/10,
        'type' => 0
      ]);

      DB::table('products')->insert([
        'name' => 'Xương sườn',
        'price' => 150000,
        'image' => 'lon4.jpg',
        'description' => 'Thịt heo là thịt từ con heo, là một loại thực phẩm rất phổ biến trên thế giới, tiêu thụ thịt heo của người Việt chiếm tới 73,3%, thịt gia cầm là 17,5% và chỉ 9,2% còn lại là thịt các loại (thịt bò, thịt trâu, thịt dê...), điều này xuất phát từ truyền thống ẩm thực của người Việt thường ăn thịt heo và thịt gà nhiều hơn các loại thịt khác',
        'discount' => rand(0,1)/10,
        'type' => 0
      ]);

      DB::table('products')->insert([
        'name' => 'Tai',
        'price' => 170000,
        'image' => 'lon5.jpg',
        'description' => 'Thịt heo là thịt từ con heo, là một loại thực phẩm rất phổ biến trên thế giới, tiêu thụ thịt heo của người Việt chiếm tới 73,3%, thịt gia cầm là 17,5% và chỉ 9,2% còn lại là thịt các loại (thịt bò, thịt trâu, thịt dê...), điều này xuất phát từ truyền thống ẩm thực của người Việt thường ăn thịt heo và thịt gà nhiều hơn các loại thịt khác',
        'discount' => rand(0,1)/10,
        'type' => 0
      ]);

      DB::table('products')->insert([
        'name' => 'Thịt thăn',
        'price' => 90000,
        'image' => 'lon6.jpg',
        'description' => 'Thịt heo là thịt từ con heo, là một loại thực phẩm rất phổ biến trên thế giới, tiêu thụ thịt heo của người Việt chiếm tới 73,3%, thịt gia cầm là 17,5% và chỉ 9,2% còn lại là thịt các loại (thịt bò, thịt trâu, thịt dê...), điều này xuất phát từ truyền thống ẩm thực của người Việt thường ăn thịt heo và thịt gà nhiều hơn các loại thịt khác',
        'discount' => rand(0,1)/10,
        'type' => 0
      ]);

      DB::table('products')->insert([
        'name' => 'Tim',
        'price' => 150000,
        'image' => 'lon7.jpg',
        'description' => 'Thịt heo là thịt từ con heo, là một loại thực phẩm rất phổ biến trên thế giới, tiêu thụ thịt heo của người Việt chiếm tới 73,3%, thịt gia cầm là 17,5% và chỉ 9,2% còn lại là thịt các loại (thịt bò, thịt trâu, thịt dê...), điều này xuất phát từ truyền thống ẩm thực của người Việt thường ăn thịt heo và thịt gà nhiều hơn các loại thịt khác',
        'discount' => rand(0,1)/10,
        'type' => 0
      ]);

      DB::table('products')->insert([
        'name' => 'Thịt vai',
        'price' => 150000,
        'image' => 'lon8.jpg',
        'description' => 'Thịt heo là thịt từ con heo, là một loại thực phẩm rất phổ biến trên thế giới, tiêu thụ thịt heo của người Việt chiếm tới 73,3%, thịt gia cầm là 17,5% và chỉ 9,2% còn lại là thịt các loại (thịt bò, thịt trâu, thịt dê...), điều này xuất phát từ truyền thống ẩm thực của người Việt thường ăn thịt heo và thịt gà nhiều hơn các loại thịt khác',
        'discount' => rand(0,1)/10,
        'type' => 0
      ]);

      DB::table('products')->insert([
        'name' => 'Giò lụa',
        'price' => 150000,
        'image' => 'gio.jpg',
        'description' => str_random(50),
        'discount' => rand(0,1)/10,
        'type' => 1
      ]);

      DB::table('products')->insert([
        'name' => 'Xúc xích',
        'price' => 150000,
        'image' => 'xucxich.jpg',
        'description' => str_random(50),
        'discount' => rand(0,1)/10,
        'type' => 1
      ]);
    }
}
