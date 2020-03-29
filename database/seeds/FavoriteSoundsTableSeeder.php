<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavoriteSoundsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('favorite_sounds')->insert([
            'user_id'  => 1,
            'sound_id' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);

        DB::table('favorite_sounds')->insert([
            'user_id'  => 1,
            'sound_id' => 2,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);

    }
}
