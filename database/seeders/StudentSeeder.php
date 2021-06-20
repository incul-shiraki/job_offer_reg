<?php

use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
    	DB::table('students')->delete();
			$faker = Faker¥Factory::create('ja_JP');

			for ($i = 0;$i < 10 ; $i++) {
					¥App¥Student::create([
						'name' => $faker->name();
						'email' => $faker->email();
						'tel' => $faker->tel();	
					]);
			}
		}
}
