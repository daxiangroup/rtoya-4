<?php namespace Rtoya\Art\Model;

use \Eloquent;

class ArtPhoto extends Eloquent {
    protected $table = 'arts_photos';

    public function art()
    {
        $this->belongsTo('Art');
    }
}
