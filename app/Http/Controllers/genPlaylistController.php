<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\playlist;
use App\playlistSongs;
use App\Song;

class genPlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('music.genPlaylist');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $playlist = playlist::firstOrCreate(
            ['name' => $req->playlistName,
            'user_id' => auth()->user()->id
            ]);
            $msg = "";
            if($playlist->wasRecentlyCreated){
                $playlistId = playlist::where('name',$req->playlistName)->first()->id;
                $genre = $req->genreId;
                // var_dump($genre);
                $songs = Song::where('genre_id', $genre)->inRandomOrder()->limit(10)->get();
                foreach($songs as $song){
                    $playlistSong = playlistSongs::firstOrCreate([
                        'song_id' =>$song->id,
                        'playlist_id' => $playlistId
                        ]);
                    }
                    $msg = 'Playlist was Generated successfully';
                // $validator->messages();
            } else {
                $msg ='This playlist name already exist, please use another name';
            }

            return view('music.genPlaylist')->with('msg', $msg);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
