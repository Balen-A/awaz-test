<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\playlistSongs;
use App\Song;
use App\Artist;

class AjaxController extends Controller
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
        $data = $request->all();
        #create or update your data here
        $songId = $data['songId'];
        $playlistId = $data['playlistId'];
        $playlistSong = playlistSongs::firstOrCreate([
            'song_id' =>$songId,
            'playlist_id' => $playlistId
        ]);
        // var_dump($playlistSong);
        if ($playlistSong->wasRecentlyCreated) {
            return response()->json(['success'=>'Ajax request submitted successfully']);
        } else {
            return response()->json(['fail'=>'Ajax request was not submitted successfully']);
        }


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
        // return view("dasd");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        $data=$req->all();
        // dd("dss");
        $playlistId = $data['playlistId'];
        $songId = $data['songId'];
        $playlistSong = playlistSongs::where([
            ['song_id',$songId],
            ['playlist_id',$playlistId]
            ])->first()->id;
        $pSong = playlistSongs::where('id',$playlistSong)->delete();
        // return view('fs');
        return $pSong;
        // return response()->json(['success'=>'Ajax request submitted successfully']);

    }

    public function increment(Request $req)
    {
        $data=$req->all();
        $songId = $data['songId'];
        Song::where('id',$songId)->increment('plays');
        $artistId = Song::where('id',$songId)->first()->artist_id;
        Artist::where('id',$artistId)->increment('plays');

    }
}
