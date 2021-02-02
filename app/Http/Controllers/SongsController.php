<?php

namespace App\Http\Controllers;

use App\Album;
use App\Artist;
use Illuminate\Http\Request;
use App\Song;

class SongsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Song::orderBy('plays', 'desc')->limit('10')->get();
        // var_dump($songs);
        // dd(get_class($songs));
        return view('music.mostPlayed' , ['songs'=>$songs]);
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
    public function show($id)
    {
        // var_dump($id);
        $song = Song::where('id',$id)->get();

        return view('music.playSong',compact('song'));
    }


    public function artist($artist_id)
    {
        // var_dump($artist_id);
        $artist = Artist::where('id',$artist_id)->get();
        $songs = Song::where('artist_id',$artist_id)->get();
        $albums = Album::where('artist_id',$artist_id)->get();

        return view('music.artist',compact('artist','songs','albums'));
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
    public function album($id)
    {
        $artistid = Album::where('id',$id)->get('artist_id')->first();
        $artist_id= $artistid->artist_id;
        $artist = Artist::where('id',$artist_id)->get();
        $songs = Song::where('album_id',$id)->get();

        return view('music.album', compact('songs','artist'));
    }
    public function mostArtist()
    {
        
        $artists = Artist::orderBy('plays', 'desc')->limit('10')->get();
        return view('music.mostArtist' , ['artists'=>$artists]);
    }
    public function recent()
    {
        
        $songs = Song::orderBy('created_at', 'desc')->limit('10')->get();
        return view('music.mostRecent' , ['songs'=>$songs]);
    }
}
