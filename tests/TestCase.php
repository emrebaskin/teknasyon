<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseMigrations;


    protected $headers = [];
    protected $scopes = [];

    public function setUp(): void
    {

        parent::setUp();

        $this->seed();

        // $clientRepository = new ClientRepository();
        // $client           = $clientRepository->createPersonalAccessClient(
        //     null, 'Test Personal Access Client', 'http://localhost'
        // );
        //
        // DB::table('oauth_personal_access_clients')->insert([
        //     'client_id'  => $client->id,
        //     'created_at' => new DateTime(),
        //     'updated_at' => new DateTime(),
        // ]);
        //
        // $this->user           = new User();
        // $this->user->name     = 'Test User';
        // $this->user->email    = 'example@example.com';
        // $this->user->password = '123456';
        // $this->user->save();

        $user                           = User::query()->findOrFail(1);
        $token                          = $user->createToken('TestToken', $this->scopes)->accessToken;
        $this->headers['Accept']        = 'application/json';
        $this->headers['Authorization'] = 'Bearer '.$token;
    }

    public function get($uri, array $headers = [])
    {
        return parent::get($uri, array_merge($this->headers, $headers));
    }

    public function getJson($uri, array $headers = [])
    {
        return parent::getJson($uri, array_merge($this->headers, $headers));
    }

    public function post($uri, array $data = [], array $headers = [])
    {
        return parent::post($uri, $data, array_merge($this->headers, $headers));
    }

    public function postJson($uri, array $data = [], array $headers = [])
    {
        return parent::postJson($uri, $data, array_merge($this->headers, $headers));
    }

    public function put($uri, array $data = [], array $headers = [])
    {
        return parent::put($uri, $data, array_merge($this->headers, $headers));
    }

    public function putJson($uri, array $data = [], array $headers = [])
    {
        return parent::putJson($uri, $data, array_merge($this->headers, $headers));
    }

    public function patch($uri, array $data = [], array $headers = [])
    {
        return parent::patch($uri, $data, array_merge($this->headers, $headers));
    }

    public function patchJson($uri, array $data = [], array $headers = [])
    {
        return parent::patchJson($uri, $data, array_merge($this->headers, $headers));
    }

    public function delete($uri, array $data = [], array $headers = [])
    {
        return parent::delete($uri, $data, array_merge($this->headers, $headers));
    }

    public function deleteJson($uri, array $data = [], array $headers = [])
    {
        return parent::deleteJson($uri, $data, array_merge($this->headers, $headers));
    }

}
