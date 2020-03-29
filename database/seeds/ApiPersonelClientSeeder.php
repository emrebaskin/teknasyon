<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\ClientRepository;

class ApiPersonelClientSeeder extends Seeder
{
    /**
     * @throws Exception
     */
    public function run()
    {

        $clientRepository = new ClientRepository();
        $client           = $clientRepository->createPersonalAccessClient(
            null, 'Api Personal Access Client', 'http://localhost'
        );

        DB::table('oauth_personal_access_clients')->insert([
            'client_id'  => $client->id,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);

    }
}
