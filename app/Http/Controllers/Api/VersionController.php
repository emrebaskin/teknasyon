<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\VersionControlService;
use App\Webservice\ErrorCodes;
use App\Webservice\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VersionController extends Controller
{

    /**
     * @param  Request  $request
     *
     * @return JsonResponse
     */
    public function index(Request $request)
    {

        $validationRules = [
            'platform'     => 'required|string|in:ios,andoid',
            'app_version'  => 'required|string',
            'lang_version' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $validationRules);

        if ($validator->fails()) {

            return Response::fail(
                ErrorCodes::PARAMETER_INVALID,
                ErrorCodes::PARAMETER_INVALID_MESSAGE
            );

        }

        $platform    = $request->input('platform');
        $appVersion  = $request->input('app_version');
        $langVersion = $request->input('lang_version');

        $versionControl = new VersionControlService($platform, $appVersion, $langVersion);

        return Response::success([
            'soft_update'  => $versionControl->checkNewestVersion(),
            'force_update' => $versionControl->checkForceUpdate(),
            'lang_update'  => $versionControl->checkNewestLanguageVersion(),
        ]);

    }

}
