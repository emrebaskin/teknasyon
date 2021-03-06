<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ApiPersonelClientSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(SoundsTableSeeder::class);
        $this->call(FavoriteSoundsTableSeeder::class);
        $this->call(VersionsTableSeeder::class);
    }
}
