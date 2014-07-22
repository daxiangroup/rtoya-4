<?php

$controller = 'Rtoya\Art\ArtController@';

Route::get('/art', array(
    'uses' => $controller.'getIndex',
    'as'   => 'art'));

Route::get('/art/{id}', array(
    'uses' => $controller.'getArtsById',
    'as'   => 'art.artsById'))
    ->where('id', '[0-9]+');

Route::get('/art/{name}', array(
    'uses' => $controller.'getArtsByName',
    'as'   => 'art.artsByName'))
    ->where('name', '[a-zA-Z]+');

Route::get('/art/{name}/{id}', array(
    'uses' => $controller.'getArtById',
    'as'   => 'art.byId'))
    ->where('name', '[a-zA-Z]+')
    ->where('id', '[0-9]+');
