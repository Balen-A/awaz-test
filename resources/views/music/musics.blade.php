
@component('components.master')
@isset($songs)
@if (count($songs) > 0)
<body onload="audio({{ $songs }})"></body>
<h1 class="text-color text-center">Songs</h1>
<?php
$index=0;
?>
@foreach ($songs as $song)
    <div class="dropdown">
        <h1 class="text-white">
            {{-- {{ $song->title }} --}}
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
@endforeach
<div class=" row w-75 mx-auto mb-2 fixed-bottom" style="min-width: 620px;">
    <div class="col-4 ">
        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-2 mt-3">
                <div class="row">
                    {{-- <span class="trackName">
                        <span class="text-white d-block" role="link" tabindex="0">
                            <figcaption id="songName"> {{ $song->title }}</figcaption>
                        </span>
                    </span> --}}
                </div>
            </div>
        </div>
    </div>

        {{-- <div class="row justify-content-center ">
            <span class="text-white d-block" role="link" tabindex="0">
                <figcaption class="h3 text-color" id="songName"> {{ $song->title }}</figcaption>
            </span>
        </div>
        <div class="row">
            <figure class="mx-auto">

                <button type="button" class="btn-sm btn-color mt-1" onclick="prev()"><i class="fas fa-backward"></i></button>
                <button type="button" class="btn-sm btn-color" onclick="next()"><i class="fas fa-forward"></i></button>
            </figure>
        </div> --}}
        @include('music._nowPlaying')

</div>
@endif
@endisset
@endcomponent
