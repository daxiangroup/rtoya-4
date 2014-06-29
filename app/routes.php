<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
    return View::make('home');
});

Route::post('/signin', array('as' => 'signin.post', function()
{
    return 'here we are, posting';
}));

Route::get('/forgot-password', array('as' => 'forgotpassword', function()
{
    return 'forgot password';
}));