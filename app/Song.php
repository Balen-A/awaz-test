<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Song extends Model
{
    protected $table = 'songs';
    public $primaryKey = 'id';
    public $timestamps = true;

    use Searchable;

    protected $fillable = [
        'title','artist_id','genre_id','album_id','path','s3_key',
     ];

     public function artist()
    {
        return $this->belongsTo('App\Artist');
    }
    public function album()
    {
        return $this->hasOne('App\album');
    }
    public function genre()
    {
        return $this->hasOne('App\Genre','genre_id');
    }
    public function tag()
    {
        return $this->belongsToMany('App\Tag');
    }
    public function listSongs()
    {
        foreach(self::pluck('id') as $song){
            $song = self::whereId($song)->first();
        }
        return $song;
    }
    public function playlist()
    {
        return $this->belongsToMany('App\playlist')->using('App\playlistSongs');
        // return $this->belongsToMany('App\playlist');
    }
    public function searchableAs()
    {
        return 'songs';
    }
}
