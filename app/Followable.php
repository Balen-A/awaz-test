<?php
namespace App;
use app\User;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

trait Followable{
    // protected $table = 'follows';
    public function follow(User $user){
        return $this->follows()->save($user);
    }

    public function follows(){
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }
    public function following(User $user){
        return $this->follows->contains($user);
    }
    public function unfollow(User $user)
    {
        $followingId=$user->id;
        $userId=auth()->user()->id;
        // $unfollow =  DB::delete("delete follows where user_id =' [$userId] 'AND following_user_id = '[$followingId]");
        $unfollow =  DB::delete("DELETE FROM follows WHERE user_id ='$userId' AND following_user_id= '$followingId'");
        // table('follows')->where([
        //     ['user_id',$userId],
        //     ['following_user_id',$followingId]
        //     ])->first()->delete();
        // $pSong = playlistSongs::where('id',$playlistSong)->delete();
        // return $unfollow;
    }


}


