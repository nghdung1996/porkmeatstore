<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->truncate();

      for ($i=0; $i < 15; $i++) { 
        DB::table('users')->insert([
          'name' => str_random(6),
          'email' => str_random(6).'@gmail.com',
          'password' => bcrypt('secret'),
          'address' => str_random(20),
          'phone' => "0964530265"
          ]);
      }
      DB::table('users')->insert([
        'name' => 'Admin',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('123456'),
        'address' => "Di Nau - Thach That - Ha Noi",
        'phone' => "0964530265",
        'role' => 2
      ]);

      DB::table('users')->insert([
        'name' => 'Quan ly',
        'email' => 'quanly@gmail.com',
        'password' => bcrypt('123456'),
        'address' => "Di Nau - Thach That - Ha Noi",
        'phone' => "0964530265",
        'role' => 1
      ]);
    }
}
