<?php namespace Rtoya\Art\Service;

use \User;
use Rtoya\Art\Model\Art;

class ArtService
{
    public function retrieveUserByName($name)
    {
        return User::where('name', '=', $name)
            ->first();
    }

    public function retrieveUserById($user_id)
    {
        return User::find($user_id);
    }

    public function retrieveArtsByUserId($user_id)
    {
        return Art::where('user_id', '=', $user_id)
            ->get();
    }

    public function retrieveArtById($id)
    {
        return Art::find($id);
    }

    public function retrieveFeaturedArts()
    {
        $ids = array(1,2);

        foreach ($ids as $id) {
            $arts[] = $this->retrieveArtById($id);
        }

        return $arts;
    }
}
