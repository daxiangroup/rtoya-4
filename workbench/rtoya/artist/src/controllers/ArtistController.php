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

    // Route:: /artist/featured
    public function getFeaturedArtist()
    {
        $featuredArtists = $this->artistService
            ->retrieveFeaturedArtists($this->userService);

        return View::make('art::art-featured-artist')
            ->with('featuredArtists', $featuredArtists);
    }

    // Route:: /artist/featured/galleries
    public function getFeaturedGalleries()
    {
        $featuredGalleries = $this->artService
            ->retrieveFeaturedGalleries();

        return View::make('art::art-featured-gallery')
            ->with('featuredGalleries', $featuredGalleries);
    }

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

    // Route /artist/{userName}/galleries
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
            ->retrieveGalleryByNameSlug($user->id, $galleryName);
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

}
