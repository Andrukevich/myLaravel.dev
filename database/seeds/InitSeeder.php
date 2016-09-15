<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class InitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $news = DB::table('news');
        $faker = Factory::create();

        $news->truncate();

        for($i = 0; $i < 100; $i++){
            $title = $faker->sentence(6);

            $news->insert([
                'title' => $title,
                'slug' => $this->transliterate($title),
                'description' => $faker->paragraph(15)
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        $order = DB::table('orders');
        $order->truncate();

        for($i = 0; $i < 100; $i++) {
            $date = $faker->dateTimeBetween('-10 years');
            $order->insert([
                'age' => $faker->numberBetween(18, 40),
                'name' => $faker->name,
                'height' => $faker->randomFloat(2, 1, 2),
                'weight' => $faker->numberBetween(35, 120),
                'price' => $faker->randomFloat(2, 100, 2000),
                'special_price' => (rand(0, 1)) ? $faker->randomFloat(2, 100, 2000) : null,
                'created_at' => $date,
                'updated_at' => $date,
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }

    private function transliterate($st) {
        $st = strtr($st,
            "абвгдежзийклмнопрстуфыэАБВГДЕЖЗИЙКЛМНОПРСТУФЫЭ",
            "abvgdegziyklmnoprstufieABVGDEGZIYKLMNOPRSTUFIE"
        );
        $st = strtr($st, array(
            'ё'=>"yo",    'х'=>"h",  'ц'=>"ts",  'ч'=>"ch", 'ш'=>"sh",
            'щ'=>"shch",  'ъ'=>'',   'ь'=>'',    'ю'=>"yu", 'я'=>"ya",
            'Ё'=>"Yo",    'Х'=>"H",  'Ц'=>"Ts",  'Ч'=>"Ch", 'Ш'=>"Sh",
            'Щ'=>"Shch",  'Ъ'=>'',   'Ь'=>'',    'Ю'=>"Yu", 'Я'=>"Ya",
        ));

        return $st;
    }
}
