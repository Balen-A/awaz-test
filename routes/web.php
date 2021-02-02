<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Redirect;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('logout', function ()
{
    Auth::logout();
    Session()->flush();

    return Redirect('home');
})->name('logout');

Route::post('/search/search', 'SearchController@show');
Route::get('/search/{search}', 'SearchController@show');
Route::get('/search', 'SearchController@index');

Route::post('/profiles/{user}/follow', 'FollowsController@store');
Route::post('/profiles/{user}/unfollow', 'FollowsController@destroy');
Route::get('/profiles/{user}/edit', 'ProfilesController@edit');
Route::get('/profiles/{user}', 'ProfilesController@show')->name('profiles');
Route::post('/updateProfile', 'userController@edit');


Route::get('/music/musics/list', 'addMusicController@list');
Route::get('/addMusic', 'addMusicController@lindex');
Route::resource('/addMusic', 'addMusicController');

Route::get('/friends/{id}', 'FriendsController@show');
Route::get('/friends', 'FriendsController@index');


Route::post('/createPlaylist/{id}','playListController@store')->name('createPlaylist');
Route::get('/createPlaylist', 'playListController@index')->name('createPlaylist');


Route::get('/myPlaylists/all', 'playListController@myplaylists');

Route::post('/ajax-request/{song_id}', 'AjaxController@store');
Route::post('/ajax-request/increment/{songId}', 'AjaxController@increment');
Route::post('/ajax-request/{playlistId}/{songId}', 'AjaxController@destroy');


Route::get('/playlistSongs/{id}', 'playlistSongController@show');


Route::get('/songs/mostPlayed', 'SongsController@index');
Route::get('/mostPlayed/artist', 'SongsController@mostArtist');
Route::get('/mostRecent', 'SongsController@recent');


Route::get('/songs/playSong/{id}', 'SongsController@show');

Route::get('/artist/{artist_id}', 'SongsController@artist');

Route::post('/genPlaylist/gen', 'genPlaylistController@create');
Route::get('/genPlaylist', 'genPlaylistController@index');


Route::get('/album/{id}', 'SongsController@album');


Route::post('/sign-file', 'S3Controller@signFile');
Route::post('/play-song', 'S3Controller@play');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/api/songs/{songId}', 'APISongsController@getOne');
Route::get('/api/songs/{songId}/play', 'APISongsController@playOne');

// Route::post('/upload', function () {
//     dd(request()->file('file'));
// });
