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
    <div class="col-4 m-2 w-50 text-center">
        <div class="row justify-content-center ">
            <span class="text-white d-block" role="link" tabindex="0">
                <figcaption class="h3 text-color" id="songName"> {{ $song->title }}</figcaption>
            </span>
        </div>
        <div class="row">

            <figure class="mx-auto">
                <audio id="currentSong" controls autoplay ></audio>
                <button type="button" class="btn-sm btn-color mt-1" onclick="prev()"><i class="fas fa-backward"></i></button>
                <button type="button" class="btn-sm btn-color" onclick="next()"><i class="fas fa-forward"></i></button>
            </figure>
        </div>
    </div>
</div>
