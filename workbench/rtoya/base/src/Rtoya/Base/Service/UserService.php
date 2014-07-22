<?php namespace Rtoya\Base\Service;

use \User;

class UserService
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
}
