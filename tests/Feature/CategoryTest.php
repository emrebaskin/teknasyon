<?php

namespace Tests\Feature;

use Tests\TestCase;

class CategoryTest extends TestCase
{

    public function testCategories()
    {

        $response = $this->post(route('api.categories'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'errorCode',
            'errorMessage',
            'result' => [
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'image_url',
                    ],
                ],
            ],
        ]);

        $response->assertJsonFragment([
            'errorCode'    => 0,
            'errorMessage' => null,
        ]);

    }

    public function testCategory()
    {

        $response = $this->post(route('api.category', ['id' => 1]));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'errorCode',
            'errorMessage',
            'result' => [
                'id',
                'name',
                'image_url',
                'sounds' => [
                    '*' => [
                        "id",
                        "name",
                        "sound_url",
                        "length",
                        "category_id",
                    ],
                ],
            ],
        ]);

        $response->assertJsonFragment([
            'errorCode'    => 0,
            'errorMessage' => null,
        ]);

    }

}
