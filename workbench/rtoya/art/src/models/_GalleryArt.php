<?php namespace Rtoya\Art\Model;

use \Eloquent;

class GalleryArt extends Eloquent {
    protected $table = 'arts_gallery_art';

    public function gallery()
    {
        return $this->belongsTo('Gallery', 'gallery_id', 'id');
    }
    public function art()
    {
        return $this->hasOne('Art', 'id', 'art_id');
    }
}
