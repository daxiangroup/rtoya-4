<?php

$controller = 'Rtoya\Account\AccountController@';

Route::group(array('before' => 'auth'), function() use ($controller) {

    Route::get('/account', array(
        'uses' => $controller.'getIndex',
        'as'   => 'account'));

    Route::get('/account/{id}/edit/settings', array(
        'uses' => $controller.'getEditSettings',
        'as'   => 'account.edit.settings'))
        ->where('id', '[0-9]+');

    Route::get('/account/{id}/edit/password', array(
        'uses' => $controller.'getEditPassword',
        'as'   => 'account.edit.password'))
        ->where('id', '[0-9]+');

    // Route::get('/account/{name}/edit/settings', array(
    //     'uses' => $controller.'getEditByName',
    //     'as'   => 'account.edit.settings.byName'))
    //     ->where('name', '[a-zA-Z]+');

    Route::post('/account/{id}/edit/{any?}', array(
        'uses' => $controller.'postSave',
        'as'   => 'account.save'))
        ->where('id', '[0-9]+');

    // Route::post('/account/{name}/edit/{any?}', array(
    //     'uses' => $controller.'postSave',
    //     'as'   => 'account.save'))
    //     ->where('name', '[a-zA-Z]+');
});

Route::get('/ding', function() {
    return Hash::make('test');
});