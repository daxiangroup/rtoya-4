<?php namespace Rtoya\Art\Model;

use \Eloquent;

class Art extends Eloquent {

    public function photos()
    {
        return $this->hasMany('ArtPhoto');
    }

    public function user()
    {
        return $this->hasOne('User', 'id', 'user_id');
    }

    public function galleries()
    {
        return $this->belongsToMany('Gallery', 'arts_gallery_art');
    }
}
