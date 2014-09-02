<?php

$routePrefix = '/'.Config::get('app.packages.art.prefix');
$controller  = Config::get('app.packages.art.controller').'@';

Route::get($routePrefix, array(
    'uses' => $controller.'getIndex',
    'as'   => 'art'));

Route::get($routePrefix.'/featured', array(
    'uses' => $controller.'getFeaturedArt',
    'as'   => 'art.featuredArt'));

Route::get($routePrefix.'/{id}/{empty?}', array(
    'uses' => $controller.'getArtById',
    'as'   => 'art.artById'))
    ->where('id', ArtService::REGEXP_ART_ID);
