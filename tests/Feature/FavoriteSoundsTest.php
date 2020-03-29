<?php

namespace Tests\Feature;

use Tests\TestCase;

class FavoriteSoundsTest extends TestCase
{

    public function testFavoriteSounds()
    {

        $response = $this->get(route('api.favoriteSounds'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'errorCode',
            'errorMessage',
            'result' => [
                '*' => [
                    'id',
                    'name',
                    'sound_url',
                    'length',
                    'category_id',
                ],
            ],
        ]);

        $response->assertJsonFragment([
            'errorCode'    => 0,
            'errorMessage' => null,
        ]);

    }

    public function testAddFavoriteSound()
    {

        $response = $this->post(route('api.favoriteSoundAdd', ['id' => 3]));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'errorCode',
            'errorMessage',
            'result'
        ]);

        $response->assertJsonFragment([
            'errorCode'    => 0,
            'errorMessage' => null,
        ]);

    }

    public function testDeleteFavoriteSound()
    {

        $response = $this->delete(route('api.favoriteSoundDelete', ['id' => 2]));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'errorCode',
            'errorMessage',
            'result'
        ]);

        $response->assertJsonFragment([
            'errorCode'    => 0,
            'errorMessage' => null,
        ]);

    }

}
