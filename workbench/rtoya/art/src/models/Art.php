<?php namespace Rtoya\Art\Model;

use \Eloquent;

class Art extends Eloquent {

    public function photos()
    {
        return $this->hasMany('ArtPhoto');
    }

    public function primaryPhoto()
    {
        // $this-
    }
}
