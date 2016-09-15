<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->truncate();

        $faker = Factory::create();

        for($i = 0; $i < 100; $i++){
            $date = $faker->dateTimeBetween();

            DB::table('companies')->insert([


                'title'   => $faker->unique()->company,
                'address' => $faker->streetAddress,
                'phone'   => $faker->phoneNumber,


                'created_at' => $date,
                'updated_at' => $date,

            ]);
        }
    }

}
