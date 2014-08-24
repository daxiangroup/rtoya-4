<?php namespace Rtoya\Art\Model;

use \Eloquent;

class Gallery extends Eloquent {
    protected $table = 'arts_gallery';

    public function arts()
    {
        return $this->belongsToMany('Art', 'arts_gallery_art');
    }

    public function user()
    {
        return $this->hasOne('User', 'id', 'user_id');
    }
}
