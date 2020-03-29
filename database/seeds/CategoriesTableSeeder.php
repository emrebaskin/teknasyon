<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        DB::table('categories')->insert([
            'name'      => 'Kuş sesleri',
            'image_url' => $faker->imageUrl(500,250),
        ]);

        DB::table('categories')->insert([
            'name'      => 'Piyano sesleri',
            'image_url' => $faker->imageUrl(500,250),
        ]);

        DB::table('categories')->insert([
            'name'      => 'Doğa sesleri',
            'image_url' => $faker->imageUrl(500,250),
        ]);

        DB::table('categories')->insert([
            'name'      => 'Yağmur sesleri',
            'image_url' => $faker->imageUrl(500,250),
        ]);

        DB::table('categories')->insert([
            'name'      => 'Enstrüman sesleri',
            'image_url' => $faker->imageUrl(500,250),
        ]);

    }
}
