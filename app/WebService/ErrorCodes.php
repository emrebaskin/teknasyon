<?php

namespace App\Webservice;

/**
 * Class ErrorCodes
 * @package App\Webservice
 *
 * API Error Codes & Messages stores here.
 */
abstract class ErrorCodes
{
    const SUCCESS = 0;
    const SUCCESS_MESSAGE = null;

    const TOKEN_INVALID = 1;
    const TOKEN_INVALID_MESSAGE = 'Api token invalid';

    const LOGIN_USER_INVALID_CREDENTIALS = 10;
    const LOGIN_USER_INVALID_CREDENTIALS_MESSAGE = 'Invalid credentials';

    const REGISTER_USER_EXISTS = 11;
    const REGISTER_USER_EXISTS_MESSAGE = 'User already exists';

    const REGISTER_USER_PASSWORDS_NOT_MATCH = 12;
    const REGISTER_USER_PASSWORDS_NOT_MATCH_MESSAGE = 'Passwords not match.';

    const PARAMETER_INVALID = 20;
    const PARAMETER_INVALID_MESSAGE = 'Invalid or missing parameters';

    const SOUND_NOT_FOUND = 30;
    const SOUND_NOT_FOUND_MESSAGE = 'Sound not found';

    const METHOD_NOT_EXISTS = 404;
    const METHOD_NOT_EXISTS_MESSAGE = 'Api method not exists';

    const METHOD_NOT_ALLOWED = 405;
    const METHOD_NOT_ALLOWED_MESSAGE = 'Http method not allowed';

    const SERVER_ERROR = 500;
    const SERVER_ERROR_MESSAGE = 'Server error';
}
