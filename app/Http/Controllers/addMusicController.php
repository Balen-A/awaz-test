<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;
use App\Song;
use App\Artist;
use App\Genre;
use App\Http\Controllers\DB;

class addMusicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //    return Post::all();
        return view('music.addMusic');
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
        $artist = Artist::firstOrCreate(['name' => $request->artist_name]);

        $genre = Genre::firstOrCreate(['genre' => $request->genre_name]);
        $artistId = Artist::where('name',$request->artist_name)->first()->id;
        $album = Album::firstOrCreate(
            ['title' => $request->album_name],
            ['artist_id'=>$artistId],
            ['cover_img' => $request->album_name]

        );

        $genreId = Genre::where('genre',$request->genre_name)->first()->id;
        $albumId = Album::where('title',$request->album_name)->first()->id;
        // Song::firstOrCreate(['title' =>$request->title],['artist_id' => $artistId], ['genre_id' => $genreId],['album_id'=> $albumId]);
        // $song = Song::firstOrCreate(['title' =>$request->title],['artist_id'=>$artistId], ['genre_id' => $genreId],['album_id'=> $albumId],['path' => $request->path]);

        // return;

        // exit();
        var_dump($request->s3_key);

        // exit;
        $song = Song::firstOrCreate([
            'title' =>$request->title,
            'artist_id' => $artistId,
            'genre_id' => $genreId,
            'album_id'=> $albumId,
            's3_key' => $request->s3_key,
            'path' => $request->path
        ]);


        Album::where('title',$request->album_name)->increment('nSongs');
        return view('music.musics')->with('success', 'song added');
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
    public function list()
    {
        $songs = Song::all();
        return view('music.musics', ['songs'=>$songs]);
    }


}
