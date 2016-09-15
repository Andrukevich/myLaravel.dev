<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class TestSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tests')->truncate();

        $faker = Factory::create();

        for($i = 0; $i < 10; $i++){
            $date = $faker->dateTimeBetween();

            DB::table('tests')->insert([
                'email' => $faker->email,
                'age' => $faker->numberBetween(18, 65),
                'about' => $faker->text(),
                'created_at' => $date,
                'updated_at' => $date,
                'gender' => $faker->title()
            ]);
        }
    }
}
