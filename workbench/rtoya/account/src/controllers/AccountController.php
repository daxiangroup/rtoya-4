<?php namespace Rtoya\Account;

use \BaseController;
use \View;

class AccountController extends BaseController {

    public function getIndex()
    {
        return View::make('account::account');
    }
}
