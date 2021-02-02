<?php

namespace App\Http\Controllers;
use App\playlist;
use App\playlistSongs;
use App\Song;
use Illuminate\Http\Request;

class playlistSongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show(Request $req)
    {
        $playlistId =$req['id'];
        $playlistName =playlist::whereId($playlistId)->first();
        // $pList = pg_fetch_assoc($playlistName);
        // $song = new playlistSongs;
        $playlist = playlistSongs::where('playlist_id', $playlistId)->pluck('song_id');
        // $id = $playlist->id;
        $songs=array();
        foreach($playlist as $item){
            $song = Song::whereId($item)->first();
            array_push($songs,$song);
        }
        // dd(gettype($songs));

        return view('music.playlistSongs' , ['songs'=>$songs],['playlistName'=>$playlistName]);
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
