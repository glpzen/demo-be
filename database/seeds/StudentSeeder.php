<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($x = 0; $x <= 10; $x++) {
            DB::table('students')->insert([
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
                'guardian_access_code' => Str::random(10),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);
        }
    }
}