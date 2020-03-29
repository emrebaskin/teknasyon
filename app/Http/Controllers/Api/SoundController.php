<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sound;
use App\Webservice\ErrorCodes;
use App\Webservice\Response;
use Illuminate\Http\Request;

class SoundController extends Controller
{

    /**
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {

        try {

            $sounds = Sound::query()
                ->with('category')
                ->findOrFail($id);

        } catch (\Exception $e) {

            return Response::fail(
                ErrorCodes::SOUND_NOT_FOUND,
                ErrorCodes::SOUND_NOT_FOUND_MESSAGE
            );

        }

        return Response::success($sounds);

    }

}
