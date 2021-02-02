@component('components.master')
@if (isset($albums ) && isset($songs ) && isset($artist ) )
    <div class="container">
        <h1 class="text-dark btn-color text-center border  rounded-pill" >{{ucwords($artist[0]->name)}}</h1>
        <h3 class="text-white text-center m-2" >Albums</h1>
        @foreach($albums as $album)
            <div class="row mt-5">
                <div class="col-12 offset-5">
                    <a href="/album/{{ $album->id }}">
                        <h2 class="text-white">{{ $loop->index + 1 }} : {{$album->title}}</h2>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endif
@endcomponent
