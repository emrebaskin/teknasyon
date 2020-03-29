<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{

    use WithFaker;

    public $email = 'user@teknasyon.com';
    public $password = '123456';

    public function testRegister()
    {

        $userData = [
            'name'                  => $this->faker->name,
            'email'                 => $this->faker->unique()->safeEmail,
            'password'              => '123456',
            'password_confirmation' => '123456',
        ];

        $response = $this->post(route('api.register'), $userData);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'errorCode',
            'errorMessage',
            'result' => [
                'user' => [
                    'id',
                    'name',
                    'email',
                ],
            ],
        ]);

        $response->assertJsonFragment([
            'errorCode'    => 0,
            'errorMessage' => null,
        ]);

    }

    public function testLogin()
    {

        $userData = [
            'email'    => $this->email,
            'password' => $this->password,
        ];

        $response = $this->post(route('api.login'), $userData);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'errorCode',
            'errorMessage',
            'result' => [
                'user' => [
                    'id',
                    'name',
                    'email',
                ],
            ],
        ]);

        $response->assertJsonFragment([
            'errorCode'    => 0,
            'errorMessage' => null,
        ]);

    }

}
