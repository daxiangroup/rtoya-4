<?php

Route::get('/dashboard', array(
    'uses' => 'Rtoya\Dashboard\DashboardController@getIndex',
    'as'   => 'dashboard'));
