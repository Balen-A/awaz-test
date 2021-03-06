<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Tag extends Model
{
    use Searchable;

    protected $table = 'tags';
    public $primaryKey = 'id';
    public $timestamps = true;
    public function song()
    {
        return $this->belongsToMany('App\Song', 'tags_songs', 'tag_id','song_id')->withTimestamps();
    }

    public function searchableAs()
    {
        return 'tags';
    }
}
