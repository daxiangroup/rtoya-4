<?php namespace Rtoya\Dashboard;

use \BaseController;
use \View;

class DashboardController extends BaseController {

    public function getIndex()
    {
        return View::make('dashboard::dashboard');
    }
}
