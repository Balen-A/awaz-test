<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Laravel\Scout\Searchable;

class Artist extends Model
{
    use Searchable;
    protected $table = 'artists';
    public $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'name','followers','liked','plays',
    ];

    public function song()
    {
        return $this->hasMany('App\Song');
    }

    public function album()
    {
        return $this->hasMany('App\Album');
    }
    public function searchableAs()
    {
        return 'artists';
    }
}
