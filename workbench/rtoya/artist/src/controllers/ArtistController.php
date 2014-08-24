<?php namespace Rtoya\Artist;

use \Auth;
use \BaseController;
use \Config;
use \User;
use \View;

use Redirect;
use Rtoya\Artist\Service\ArtistService;
use Rtoya\Base\Service\UserService;

class ArtistController extends BaseController {

    public function __construct(ArtistService $artistService, UserService $userService)
    {
        $this->artistService = $artistService;
        $this->userService   = $userService;
    }

    // public function getIndex()
    // {
    //     $featuredArts      = $this->artService
    //         ->retrieveFeaturedArts(Config::get('art::defaults.featuredLimitArts'));
    //     $featuredArtists   = $this->artService
    //         ->retrieveFeaturedArtists($this->userService, Config::get('art::defaults.featuredLimitArtists'));
    //     $featuredGalleries = $this->artService
    //         ->retrieveFeaturedGalleries(Config::get('art::defaults.featuredLimitGalleries'));

    //     return View::make('art::art-featured')
    //         ->with('featuredArts', $featuredArts)
    //         ->with('featuredArtists', $featuredArtists)
    //         ->with('featuredGalleries', $featuredGalleries);
    // }

    // Route: /artist/{artistName}
    public function getArtistByArtistName($userName)
    {
        $user = $this->userService
            ->retrieveUserByNameSlug($userName);
        if (empty($user) === true) {
            return Redirect::route('artist.notFound', $userName);
        }

        return View::make('artist::artist-display')
            ->with('user', $user);
    }

    public function getArtistGalleriesByArtistName($userName)
    {
        $user = $this->userService
            ->retrieveUserByNameSlug($userName);
        if (empty($user) === true) {
            return Redirect::route('artist.notFound', $userName);
        }

        $galleries = $this->artistService
            ->retrieveGalleriesByUserId($user->id);

        return View::make('artist::artist-galleries')
            ->with('artist',      $user)
            ->with('galleries', $galleries);
    }

    // Route: /artist/{userName}/gallery/{galleryName}
    public function getArtistGalleryByGalleryName($userName, $galleryName)
    {
        $user = $this->userService
            ->retrieveUserByNameSlug($userName);
        if (empty($user) === true) {
            return Redirect::route('artist.notFound', $userName);
        }

        $gallery = $this->artistService
            ->retrieveGalleryByNameSlug($galleryName);
        if (empty($gallery) === true) {
            return Redirect::route('artist.galleryNotFound', $userName, $galleryName);
        }

        return View::make('artist::artist-gallery')
            ->with('user', $user)
            ->with('gallery', $gallery);
    }

    // Route: /artist/{userName}/not-found
    public function getArtistNotFound($userName)
    {
        // Check if the user actually does exist (broken urls?)
        $user = $this->userService
            ->retrieveUserByNameSlug($userName);
        if (empty($user) === false) {
            return Redirect::route('artist.byArtistName', $user->name_slug);
        }

        return View::make('artist::unknown-artist')
            ->with('userName', $userName);
    }


    // // Route: /art/{id}/{empty?}
    // public function getArtByArtistName($id)
    // {
    //     $art  = $this->artService
    //         ->retrieveArtById($id);

    //     if (count($art) === 0) {
    //         return View::make('art::unknown-art')
    //             ->with('id', $id);
    //     }

    //     $user = $this->userService
    //         ->retrieveUserById($art->user->id);

    //     return View::make('art::art-display')
    //         ->with('artist', $user)
    //         ->with('art', $art);
    // }

    // // Route: /art/{name}/{id}/{empty?}
    // public function getArtByUserId($name, $id)
    // {
    //     $user = $this->userService
    //         ->retrieveUserByName($name);
    //     $art  = $this->artService
    //         ->retrieveArtById($id);

    //     if (count($user) === 0) {
    //         return View::make('art::unknown-artist')
    //             ->with('artist', $name);
    //     }

    //     if (count($art) === 0) {
    //         return View::make('art::unknown-art')
    //             ->with('artist', $user)
    //             ->with('id', $id);
    //     }

    //     return View::make('art::art-display')
    //         ->with('artist', $user)
    //         ->with('art', $art);
    // }

    // // Route: /art/gallery/{user_id}/{name?}
    // public function getGalleriesByUserId($user_id)
    // {
    //     $user      = $this->userService
    //         ->retrieveUserById($user_id);
    //     $galleries = $this->artService
    //         ->retrieveGalleriesById($user->id);

    //     return View::make('art::artist-galleries')
    //         ->with('artist', $user)
    //         ->with('galleries', $galleries);
    // }

    // // Route: /art/{name}/gallery
    // public function getGalleriesByName($name)
    // {
    //     $user      = $this->userService
    //         ->retrieveUserByName($name);
    //     $galleries = $this->artService
    //         ->retrieveGalleriesById($user->id);

    //     return View::make('art::artist-galleries')
    //         ->with('user', $user)
    //         ->with('galleries', $galleries);
    // }

    // // Route:: /art/featured
    // public function getFeaturedArt()
    // {
    //     $featuredArts    = $this->artService
    //         ->retrieveFeaturedArts();

    //     return View::make('art::art-featured-art')
    //         ->with('featuredArts', $featuredArts);
    // }

    // // Route:: /artist/featured
    // public function getFeaturedArtist()
    // {
    //     $featuredArtists = $this->artService
    //         ->retrieveFeaturedArtists($this->userService);

    //     return View::make('art::art-featured-artist')
    //         ->with('featuredArtists', $featuredArtists);
    // }

    // // Route:: /art/gallery/featured
    // public function getFeaturedGallery()
    // {
    //     $featuredGalleries = $this->artService
    //         ->retrieveFeaturedGalleries();

    //     return View::make('art::art-featured-gallery')
    //         ->with('featuredGalleries', $featuredGalleries);
    // }
}
