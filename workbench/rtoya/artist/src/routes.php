<?php

$routePrefix = '/'.Config::get('app.packages.artist.prefix');
$controller  = Config::get('app.packages.artist.controller').'@';

Route::get($routePrefix.'/{userName}', array(
    'uses' => $controller.'getArtistByArtistName',
    'as'   => 'artist.byArtistName'))
    ->where('userName', UserService::REGEXP_USER_SLUG);

Route::get($routePrefix.'/{userName}/galleries', array(
    'uses' => $controller.'getArtistGalleriesByArtistName',
    'as'   => 'artist.galleriesByArtistName'))
    ->where('userName', UserService::REGEXP_USER_SLUG);

Route::get($routePrefix.'/{userName}/gallery/{galleryName}', array(
    'uses' => $controller.'getArtistGalleryByGalleryName',
    'as'   => 'artist.galleryByGalleryName'))
    ->where('userName',    UserService::REGEXP_USER_SLUG)
    ->where('galleryName', ArtistService::REGEXP_GALLERY_SLUG);

Route::get($routePrefix.'/featured', array(
    'uses' => $controller.'getFeaturedArtist',
    'as'   => 'artist.featuredArtist'));

Route::get($routePrefix.'/{userName}/not-found', array(
    'uses' => $controller.'getArtistNotFound',
    'as'   => 'artist.notFound'));