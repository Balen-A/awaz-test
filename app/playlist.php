<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class playlist extends Model
{

    use Searchable;
    protected $table = 'playlist';
    public $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'name','user_id',
     ];
    public function songs()
    {
        return $this->hasMany('App\Song');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'id');
    }

    public function searchableAs()
    {
        return 'playlists';
    }
}
