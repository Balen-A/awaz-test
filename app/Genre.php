<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Genre extends Model
{
    use Searchable;

    protected $table = 'genre';
    public $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
       'genre',
    ];

    public function song()
    {
        return $this->belongsTo('App\Song','songs','genre_id');
    }
    public function searchableAs()
    {
        return 'genre';
    }
}
