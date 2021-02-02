@component('components.master')
    <div class="container">
        <div class="text-center d-block ">
			<button class="btn btn-color text-white" onclick="showCreatePlaylist()">NEW PLAYLIST</button>
		</div>
    </div>

    <section class="px-8 mt-3" >
        <form action="/genPlaylist/gen" method="post" style="display: none;" id="createPlaylist">
            @csrf
            <div class="form-group row">
                <label for="playlistName" class="col-md-4 col-form-label text-md-right text-white">{{ __('Name Your Playlist :') }}</label>
                <div class="col-md-4">
                    <input  type="text" class="form-control " name="playlistName" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="genreId" class="col-md-4 col-form-label text-md-right text-white">{{ __('Your Favorite Genre :') }}</label>
                <div class="col-md-4">
                <select multiple class="form-control" id="genreId" name="genreId">
                @foreach (App\Genre::all() as $genre )
                  <option value="{{$genre->id}}">{{$genre->genre}}</option>
                @endforeach
                </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4 offset-4">
                  <button class="text-white btn btn-color" type="submit">Create Playlist</button>
                </div>
</div>
        </form>
        @if ( $msg ?? '' != ""  )
            @if ($msg == "Playlist was Generated successfully")
                <h2 class="text-center text-success">{{ $msg ?? '' }}</h2>
            @else
                <h2 class="text-center text-danger">{{ $msg ?? '' }}</h2>
            @endif
        @endif
    </section>
    <hr>
    <section class="px-8 mt-3">
        <h1 class="text-center text-white">Your Playlists</h1>

        @foreach (auth()->user()->playlist()->get() as $playlist )

        <a href="/playlistSongs/{{ $playlist->id }}" class='d-inline-block mr-20 '>

            <div class='border border-white p-2'>
                <img class="img-fluid w-100 text-white" src='/images/playlist.png'>
            </div>


            <div class='text-white text-center' style="max-width: 90px">
               <span title="{{ $playlist->name }}">
                   {{ strlen($playlist->name) > 12 ? substr($playlist->name, 0, 10).'...' : $playlist->name }}
                </span>
            </div>
        </a>

        @endforeach
        {{-- @endforeach --}}


    </section>
@endcomponent
