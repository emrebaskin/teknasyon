<?php

namespace Tests\Feature;

use Tests\TestCase;

class VersionTest extends TestCase
{

    public function testAppForceUpdateAndLangUpdateRequired()
    {

        $data = [
            'platform'     => 'ios',
            'app_version'  => '1.0',
            'lang_version' => '1.0',
        ];

        $response = $this->post(route('api.versionCheck', $data));

        $response->assertJsonStructure([
            'errorCode',
            'errorMessage',
            'result' => [
                "soft_update",
                "force_update",
                "lang_update",
            ],
        ]);

        $response->assertJsonFragment([
            'errorCode'    => 0,
            'errorMessage' => null,
            'result'       => [
                "soft_update"  => true,
                "force_update" => true,
                "lang_update"  => true,
            ],
        ]);

    }

    public function testAppSoftUpdateAndLangUpdateRequired()
    {

        $data = [
            'platform'     => 'ios',
            'app_version'  => '2.0',
            'lang_version' => '1.0',
        ];

        $response = $this->post(route('api.versionCheck', $data));

        $response->assertJsonStructure([
            'errorCode',
            'errorMessage',
            'result' => [
                "soft_update",
                "force_update",
                "lang_update",
            ],
        ]);

        $response->assertJsonFragment([
            'errorCode'    => 0,
            'errorMessage' => null,
            'result'       => [
                "soft_update"  => true,
                "force_update" => false,
                "lang_update"  => true,
            ],
        ]);

    }

    public function testOnlyLangUpdateRequired()
    {

        $data = [
            'platform'     => 'ios',
            'app_version'  => '2.1',
            'lang_version' => '1.0',
        ];

        $response = $this->post(route('api.versionCheck', $data));

        $response->assertJsonStructure([
            'errorCode',
            'errorMessage',
            'result' => [
                "soft_update",
                "force_update",
                "lang_update",
            ],
        ]);

        $response->assertJsonFragment([
            'errorCode'    => 0,
            'errorMessage' => null,
            'result'       => [
                "soft_update"  => false,
                "force_update" => false,
                "lang_update"  => true,
            ],
        ]);

    }

    public function testOnlyAppSoftUpdateRequired()
    {

        $data = [
            'platform'     => 'ios',
            'app_version'  => '2.0',
            'lang_version' => '2.0',
        ];

        $response = $this->post(route('api.versionCheck', $data));

        $response->assertJsonStructure([
            'errorCode',
            'errorMessage',
            'result' => [
                "soft_update",
                "force_update",
                "lang_update",
            ],
        ]);

        $response->assertJsonFragment([
            'errorCode'    => 0,
            'errorMessage' => null,
            'result'       => [
                "soft_update"  => true,
                "force_update" => false,
                "lang_update"  => false,
            ],
        ]);

    }

    public function testOnlyAppForceUpdateRequired()
    {

        $data = [
            'platform'     => 'ios',
            'app_version'  => '1.1',
            'lang_version' => '2.0',
        ];

        $response = $this->post(route('api.versionCheck', $data));

        $response->assertJsonStructure([
            'errorCode',
            'errorMessage',
            'result' => [
                "soft_update",
                "force_update",
                "lang_update",
            ],
        ]);

        $response->assertJsonFragment([
            'errorCode'    => 0,
            'errorMessage' => null,
            'result'       => [
                "soft_update"  => true,
                "force_update" => true,
                "lang_update"  => false,
            ],
        ]);

    }

}
