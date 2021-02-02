<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    public function path($append = ' ')
    {
        $path = route('search', $this->name);

        return $append ? "{$path}/{$append}" : $path;
    }
}
