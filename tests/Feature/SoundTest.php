<?php

namespace Tests\Feature;

use Tests\TestCase;

class SoundTest extends TestCase
{

    public function testSound()
    {

        $response = $this->post(route('api.sound', ['id' => 1]));

        $response->assertJsonStructure([
            'errorCode',
            'errorMessage',
            'result' => [
                "id",
                "name",
                "sound_url",
                "length",
                "category_id",
                'category' => [
                    'id',
                    'name',
                    'image_url',
                ],
            ],
        ]);

        $response->assertJsonFragment([
            'errorCode'    => 0,
            'errorMessage' => null,
        ]);

    }

}
