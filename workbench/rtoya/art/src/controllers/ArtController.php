<?php namespace Rtoya\Art;

use \BaseController;
use \View;
use \Auth;
use \User;
use Rtoya\Art\Model\Art;
use Rtoya\Art\Service\ArtService;

class ArtController extends BaseController {

    public function __construct(ArtService $artService)
    {
        $this->artService = $artService;
    }

    public function getIndex()
    {
        $featuredArts = $this->artService
            ->retrieveFeaturedArts();
echo '<pre>';
dd($featuredArts);

        return View::make('art::index')
            ->with('featuredArts', $featuredArts);
    }

    public function getArtsById($id)
    {
        $arts = $this->artService
            ->retrieveArtsByUserId($id);
        $user = $this->artService
            ->retrieveUserById($id);

        return View::make('art::artist')
            ->with('artist', $user)
            ->with('arts', $arts);
    }

    public function getArtsByName($name)
    {
        $user = $this->artService
            ->retrieveUserByName($name);

        if (count($user) === 0) {
            return View::make('art::unknown-artist')
                ->with('artist', $name);
        }

        return $this->getArtsById($user->id);
    }

    public function getArtByid($name, $id)
    {
        $user = $this->artService
            ->retrieveUserByName($name);
        $art  = $this->artService
            ->retrieveArtById($id);

        if (count($user) === 0) {
            return View::make('art::unknown-artist')
                ->with('artist', $name);
        }

        if (count($art) === 0) {
            return View::make('art::unknown-art')
                ->with('artist', $user)
                ->with('id', $id);
        }

        return View::make('art::art')
            ->with('artist', $user)
            ->with('art', $art);
    }
}
