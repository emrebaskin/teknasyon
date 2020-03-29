<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Sound;
use App\User;
use App\Webservice\ErrorCodes;
use App\Webservice\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteSoundController extends Controller
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {

        $favoriteSounds = auth()->user()->favoriteSounds;

        return Response::success($favoriteSounds);

    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store($id)
    {

        try {

            auth()->user()->favoriteSounds()->attach($id);

        } catch (\Exception $e) {

            return Response::fail(
                ErrorCodes::SOUND_NOT_FOUND,
                ErrorCodes::SOUND_NOT_FOUND_MESSAGE
            );

        }

        return Response::success();

    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {

        try {

            auth()->user()->favoriteSounds()->detach($id);

        } catch (\Exception $e) {

            return Response::fail(
                ErrorCodes::SOUND_NOT_FOUND,
                ErrorCodes::SOUND_NOT_FOUND_MESSAGE
            );

        }

        return Response::success();

    }

}
