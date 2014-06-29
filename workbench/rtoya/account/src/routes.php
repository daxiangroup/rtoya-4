<?php

Route::get('/account', array(
    'uses' => 'Rtoya\Account\AccountController@getIndex',
    'as'   => 'account'));
