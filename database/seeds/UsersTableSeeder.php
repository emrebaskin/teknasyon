<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user           = new User();
        $user->name     = 'Teknasyon User';
        $user->email    = 'user@teknasyon.com';
        $user->password = '123456';
        $user->save();

    }
}
