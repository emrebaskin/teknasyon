<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use App\Webservice\ErrorCodes;
use App\Webservice\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $validationRules = [
            'name'     => 'required|max:55',
            'email'    => 'required|email|max:191|unique:users',
            'password' => 'required|confirmed',
        ];

        $validator = Validator::make($request->all(), $validationRules);

        if ($validator->fails()) {

            $validationErrors = $validator->failed();

            if (isset($validationErrors['email']['Unique'])) {

                return Response::fail(
                    ErrorCodes::REGISTER_USER_EXISTS,
                    ErrorCodes::REGISTER_USER_EXISTS_MESSAGE
                );

            }

            if (isset($validationErrors['password']['Confirmed'])) {

                return Response::fail(
                    ErrorCodes::REGISTER_USER_PASSWORDS_NOT_MATCH,
                    ErrorCodes::REGISTER_USER_PASSWORDS_NOT_MATCH_MESSAGE
                );

            }

            return Response::fail(
                ErrorCodes::PARAMETER_INVALID,
                ErrorCodes::PARAMETER_INVALID_MESSAGE
            );

        }

        $user        = User::create($request->only(['name', 'email', 'password']));
        $accessToken = $user->createToken('authToken')->accessToken;

        return Response::success(['user' => $user, 'access_token' => $accessToken]);

    }

    public function login(Request $request)
    {

        $validationRules = [
            'email'    => 'required|email|max:191',
            'password' => 'required',
        ];

        $validator = Validator::make($request->all(), $validationRules);

        if ($validator->fails()) {

            return Response::fail(
                ErrorCodes::PARAMETER_INVALID,
                ErrorCodes::PARAMETER_INVALID_MESSAGE
            );

        }

        if ( ! auth()->attempt($request->only(['email', 'password']))) {
            return Response::fail(
                ErrorCodes::LOGIN_USER_INVALID_CREDENTIALS,
                ErrorCodes::LOGIN_USER_INVALID_CREDENTIALS_MESSAGE
            );
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return Response::success(['user' => auth()->user(), 'access_token' => $accessToken]);

    }

    public function test () {
        return Response::success(['status' => 'başarılı']);
    }

}
