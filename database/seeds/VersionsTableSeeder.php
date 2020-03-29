<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VersionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('versions')->insert([
            'platform'              => 'android',
            'version_code'          => '1.0',
            'force_update'          => 0,
            'language_version_code' => '1.0',
        ]);

        DB::table('versions')->insert([
            'platform'              => 'android',
            'version_code'          => '1.1',
            'force_update'          => 0,
            'language_version_code' => '1.0',
        ]);

        DB::table('versions')->insert([
            'platform'              => 'android',
            'version_code'          => '1.2',
            'force_update'          => 0,
            'language_version_code' => '1.0',
        ]);

        DB::table('versions')->insert([
            'platform'              => 'android',
            'version_code'          => '2.0',
            'force_update'          => 1,
            'language_version_code' => '2.0',
        ]);

        DB::table('versions')->insert([
            'platform'              => 'android',
            'version_code'          => '2.1',
            'force_update'          => 0,
            'language_version_code' => '2.0',
        ]);

        DB::table('versions')->insert([
            'platform'              => 'ios',
            'version_code'          => '1.0',
            'force_update'          => 0,
            'language_version_code' => '1.0',
        ]);

        DB::table('versions')->insert([
            'platform'              => 'ios',
            'version_code'          => '1.1',
            'force_update'          => 0,
            'language_version_code' => '1.0',
        ]);

        DB::table('versions')->insert([
            'platform'              => 'ios',
            'version_code'          => '1.2',
            'force_update'          => 0,
            'language_version_code' => '1.0',
        ]);

        DB::table('versions')->insert([
            'platform'              => 'ios',
            'version_code'          => '2.0',
            'force_update'          => 1,
            'language_version_code' => '2.0',
        ]);

        DB::table('versions')->insert([
            'platform'              => 'ios',
            'version_code'          => '2.1',
            'force_update'          => 0,
            'language_version_code' => '2.0',
        ]);

    }
}
