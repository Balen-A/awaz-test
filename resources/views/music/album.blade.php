@component('components.master')
@isset($songs)
<body onload="audio({{ $songs }})"></body>
<?php
$index=0;
?>
    <div class="container">
        <h1 class="text-dark btn-color text-center border  rounded-pill" >{{ucwords($artist[0]->name)}}</h1>
        <div class='mt-5'>
        @foreach($songs as $song)
            <div class="row mt-1">
                <div class="col-12 offset-2">
                        
                        <div class="dropdown">
        <h1 class="text-white">
            <button type="button" class="btn btn-primary" onclick="play('{{ $song->id }}','{{ $index }}' )"><i class="fas fa-play-circle"></i></button>
            <a class="text-white"
                href="/songs/playSong/{{ $song->id }}">  {{ $loop->index + 1 }} : {{$song->title}} by {{ App\Artist::where('id',$song->artist_id)->get('name')[0]->name }}
            </a>
            <button class="btn text-white  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font: 20px;">
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="/artist/{{ $song->artist_id }}">Go To Artist</a>
                <a class="dropdown-item" href="/album/{{ $song->album_id }}">Go To Album</a>
                <a class="dropdown-item" href="#">share</a>
                <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" >add to Playlist</a>
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
                </div>
            </div>
        @endforeach
        </div>
        @include('music._nowPlaying');
    </div>

@endisset
@endcomponent