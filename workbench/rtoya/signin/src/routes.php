<?php

Route::get('/signin', array(
    'uses' => 'Rtoya\Signin\SigninController@getForm',
    'as'   => 'signin'));

Route::post('/signin', array(
    'uses' => 'Rtoya\Signin\SigninController@postSignin',
    'as'   => 'signin.post'));

Route::get('/forgot-password', array(
    'uses' => 'Rtoya\Signin\SigninController@getForgotPassword',
    'as'   => 'signin.forgotpassword'));

Route::get('/signout', array(
    'uses' => 'Rtoya\Signin\SigninController@getLogout',
    'as'   => 'signin.signout'));

Route::get('/logout', array(
    'uses' => 'Rtoya\Signin\SigninController@getLogout',
    'as'   => 'signin.logout'));

Route::get('/hash', function()
{
    return Hash::make('test');
});