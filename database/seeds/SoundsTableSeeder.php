<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SoundsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('sounds')->insert([
            'name'        => 'Kuş Sesi - 1',
            'sound_url'   => 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3',
            'length'      => '06:12',
            'category_id' => 1,
        ]);

        DB::table('sounds')->insert([
            'name'        => 'Kuş Sesi - 2',
            'sound_url'   => 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-2.mp3',
            'length'      => '07:05',
            'category_id' => 1,
        ]);

        DB::table('sounds')->insert([
            'name'        => 'Piyano Sesi - 1',
            'sound_url'   => 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-3.mp3',
            'length'      => '05:44',
            'category_id' => 2,
        ]);

        DB::table('sounds')->insert([
            'name'        => 'Piyano Sesi - 2',
            'sound_url'   => 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-4.mp3',
            'length'      => '05:02',
            'category_id' => 2,
        ]);



    }
}
