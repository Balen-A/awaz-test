@component('components.master')
@isset($songs)
<h1 class="text-color text-center"> {{ $playlistName->name }} </h1>
<script>


 const songList = @json($songs)
</script>

<?php
$index=0;
?>
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
                    <button class="btn dropdown-item"  onclick="removeFromPlaylist({{ $song->id }},{{ $playlistName->id }})">
                        remove from this playlist
                    </button>
        </div>
     </h1>
</div>
@endforeach
<?php
   $index++;
?>
@endisset
<hr>


<section>
    <h1 class="text-color text-center"> Suggested Songs </h1>
    <div>
        {{-- {{ $songss = App\Song::all() }} --}}
        @foreach (App\Song::whereNotIn('id', $songs)->inRandomOrder()->limit(4)->get() as $song)
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

        @endforeach
</div>
</section>@include('music._nowPlaying')
@endcomponent
