<?php

namespace Database\Seeders;

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
      \App\User::create([
          'name' => '山田太朗',
          'email' => 'taro@example.com',
          'password' => bcrypt('YOUR-PASSWORD')
      ]);
    }
}
