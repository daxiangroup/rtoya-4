<?php

Route::get('/signin', array('as' => 'signin', function()
{
    return View::make('signin::signin');
    return 'here we are, posting';
}));

Route::post('/signin', array('as' => 'signin.post', function()
{
    return 'here we are, posting';
}));

Route::get('/forgot-password', array('as' => 'forgotpassword', function()
{
    return 'forgot password';
}));
