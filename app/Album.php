<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
class Album extends Model
{
    use Searchable;

    protected $table = 'albums';
    public $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'title','artist_id'
     ];
    public function artist()
    {
        return $this->belongsTo('App\Artist');
    }
    public function song()
    {
        return $this->belongsTo('App\Song');
    }

    public function searchableAs()
    {
        return 'albums';
    }
}
