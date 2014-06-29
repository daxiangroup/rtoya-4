<?php namespace Rtoya\Signin;

use \BaseController;
use \Input;
use \Redirect;
use \View;
use Rtoya\Signin\Service\SigninService;

class SigninController extends BaseController {

    private $service;

    // TODO: Figure out proper IoC resolution
    public function __construct(SigninService $service)
    {
        $this->service = $service;
    }

    public function getForm()
    {
        return View::make('signin::signin');
    }

    public function postSignin()
    {
        $credentials = array(
            'email' => Input::get('email'),
            'password' => Input::get('password'),
        );

        if ($this->service->login($credentials)) {
            return Redirect::route('dashboard');
        }

        return Redirect::route('signin');
    }

    public function getForgotPassword()
    {
        return 'forgot password';
    }

    public function getLogout()
    {
        $this->service->logout();

        return Redirect::route('signin');
    }
}
