<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Followable;
use Laravel\Scout\Searchable;


class User extends Authenticatable
{
    use Notifiable;
    use Followable;
    use Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','firstName','lastName', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function getRouteKeyName()
    {
        return 'name';
    }


    public function listUsers()
    {
        foreach(self::pluck('id') as $user){
            $user = self::whereId($user)->first();
        }
        return $user;
    }
    public function path($append = ' ')
    {
        $path = route('profiles', $this->name);

        return $append ? "{$path}/{$append}" : $path;
    }

    public function playlist()
    {
        return $this->hasMany('App\playlist');
    }
    public function searchableAs()
    {
        return 'users';
    }
}
