<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class UserMeta extends Eloquent {
    protected $table = 'users_meta';

    public function user()
    {
        $this->belongsTo('User');
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }

    public function getRememberToken()
    {}

    public function setRememberToken($value)
    {}

    public function getRememberTokenName()
    {}

    /**
     * Get the standardized "slug" version of the user's name
     *
     * @return string
     */
    public function slugName()
    {
        return slugify($this->name);
    }
}