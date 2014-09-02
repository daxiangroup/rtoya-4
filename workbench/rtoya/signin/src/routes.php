<?php

$routePrefix = '/'.Config::get('app.packages.signin.prefix');
$controller  = Config::get('app.packages.signin.controller').'@';

Route::get($routePrefix, array(
    'uses' => $controller.'getForm',
    'as'   => 'signin'));

Route::post($routePrefix, array(
    'uses' => $controller.'postSignin',
    'as'   => 'signin.post'));

Route::get('/forgot-password', array(
    'uses' => $controller.'getForgotPassword',
    'as'   => 'signin.forgotpassword'));

Route::get('/signout', array(
    'uses' => $controller.'getLogout',
    'as'   => 'signin.signout'));

Route::get('/hash', function()
{
    return Hash::make('test');
});