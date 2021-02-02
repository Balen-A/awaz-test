@component('components.master')
{{-- 'users','songs','albums','artists','playlists','tags' --}}
<form action="/search/search" method="Post">
    @csrf
    <div class="form-group row">
        <label for="search" class="col-md-4 col-form-label text-white text-md-right">{{ __('Search :') }}</label>

        <div class="col-md-6">
            <input id="search" type="text" class="form-control" name="search" required autofocus>
        </div>
        <button class="btn btn-primary" type="submit"> Search</button>
    </div>
</form>


@isset($users)
@if(count($users)>0)
<hr>
        <div>
            <h2 class="text-white text-center"> Users Results</h2>
            @foreach ($users as $user)
                <h1>
                    <a href="{{ url('friends/'. $user->id) }}"><h3 class="text-white"> {{ $user->name }} </h3></a>
                </h1>
            @endforeach
        </div>
@endif
@endisset

@isset($songs)
@if(count($songs)>0)
<body onload="audio({{ $songs }})"></body>
<?php
        $index=0;
?>
    <hr>
    <div>
        <h2 class="text-white text-center"> songs Results</h2>
        @foreach ($songs as $song)
        <div class="dropdown">
            <h1 class="text-white">
                <button type="button" class="btn btn-primary" onclick="play('{{ $song->id }}','{{ $index }}' )"><i class="fas fa-play-circle"></i></button>
                <a class="text-white"
                    href="/songs/playSong/{{ $song->id }}"> {{ $song->title }} by {{ App\Artist::where('id',$song->artist_id)->get('name')[0]->name }}
                </a>
                <button class="btn text-white  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font: 20px;">
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/artist/{{ $song->artist_id }}">Go To Artist</a>
                    <a class="dropdown-item" href="/album/{{ $song->album_id }}">Go To Album</a>
                    <a class="dropdown-item" href="#">share</a>
                    <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">add to Playlist</a>
                        <ul class="dropdown-menu">
                            <li>
                                @foreach (auth()->user()->playlist()->get() as $playlist )
                                        <button class="btn btn-primary"  onclick="addPlaylist({{ $playlist->id }},{{ $song->id }})">
                                            {{ $playlist->name }}
                                        </button>
                                @endforeach
                            </li>
                        </ul>
                    </li>
                </div>
            </h1>
        </div>
        <?php
             $index++;
        ?>
         @endforeach
        </div>
@endif
@endisset


@isset($albums)
@if(count($albums)>0)
    <hr>
    <div>
    <h2 class="text-white text-center"> Albums Results</h2>
        @foreach ($albums as $album)
        <a href="/album/{{ $album->id }}">
        <h1 class="text-white">

            {{ $album->title }}
        </h1>
        </a>
        @endforeach
    </div>
@endif
@endisset


@isset($artists)
@if(count($artists)>0)
<hr>
<div>
<h2 class="text-white text-center"> Artists Results</h2>
        @foreach ($artists as $artist)
       
           <a href="/artist/{{ $artist->id }}">
                <h1 class="text-white">
                    {{ $artist->name }}
                </h1>   
           </a> 
        @endforeach
    </div>
@endif
@endisset

@isset($playlists)
@if(count($playlists)>0)
<div>
<hr>
<h2 class="text-white text-center"> Playlists Results</h2>
        @foreach ($playlists as $playlist)
        <a href="/playlistSongs/{{$playlist->id}}">
        <h1 class="text-white">
            {{ $playlist->name }}
        </h1>
        </a>
        @endforeach
    </div>
@endif
 @endisset


@isset($tags)
@if(count($tags)>0)
<div>
<hr>
<h2 class="text-white text-center"> Tags Results</h2>
        @foreach ($tags as $tag)
        <h1 class="text-white">
            {{ $tag->tag }}
        </h1>
        @endforeach
    </div>
@endif
@endisset
@isset($songs)
@if(count($songs)>0)
@include('music._nowPlaying')
@endif
@endisset
@endcomponent
