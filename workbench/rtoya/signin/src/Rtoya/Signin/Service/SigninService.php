<?php namespace Rtoya\Signin\Service;

use \Auth;

class SigninService
{
    public function login($credentials)
    {
        return Auth::attempt($credentials);
    }

    public function logout()
    {
        return Auth::logout();
    }
}
