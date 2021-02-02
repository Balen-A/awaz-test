@component('components.master')
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
@endcomponent
