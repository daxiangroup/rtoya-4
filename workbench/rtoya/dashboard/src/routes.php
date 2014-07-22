<?php

Route::group(array('before' => 'auth'), function() {

    Route::get('/dashboard', array(
        'uses' => 'Rtoya\Dashboard\DashboardController@getIndex',
        'as'   => 'dashboard'));

});
