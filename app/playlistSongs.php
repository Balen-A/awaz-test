<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Song;
use App\playlist;

class playlistSongs extends  Pivot
{
    protected $table = 'playlist_songs';
    public $primaryKey = 'id';
    public $timestamps = true;

    // // protected $fillable = [
    // //     'name','user_id',
    // //  ];
    public static function playlistSongs()
    {
        $songs = playlistSongs::all();
        return $songs;

    }
}
