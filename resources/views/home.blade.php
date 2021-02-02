@component('components.master')
    {<div class="container">
        <div class=" h-25" >
            <img src="/images/music.jpg" class="img " alt="Responsive image">
        </div>
        @auth
        <div class="text-center" >
        <div class="d-inline">
            <a href="/songs/mostPlayed" class='d-inline-block mr-20 '>
                <div class='border border-white p-2'>
                    <img class="img-fluid w-100 text-white" src='/images/playlist.png'>
                </div>
                <div class='text-white text-center' style="max-width: 90px">
                    <span title="Top 10 Songs">
                        Top 10 Songs
                    </span>
                </div>
            </a>
        </div>
        <div class="d-inline">
            <a href="/mostPlayed/artist" class='d-inline-block mr-20 '>
                <div class='border border-white p-2'>
                    <img class="img-fluid w-100 text-white" src='/images/playlist.png'>
                </div>
                <div class='text-white text-center' style="max-width: 90px">
                    <span title="Top 10 Artist">
                        Top 10 Artist
                    </span>
                </div>
            </a>
        </div>
        <div class="d-inline">
            <a href="/mostRecent" class='d-inline-block mr-20 '>
                <div class='border border-white p-2'>
                    <img class="img-fluid w-100 text-white" src='/images/playlist.png'>
                </div>
                <div class='text-white text-center' style="max-width: 90px">
                    <span title="Top 10 Artist">
                        Recent Songs
                    </span>
                </div>
            </a>
        </div>
        </div>
        @endauth
    </div>
@endcomponent
