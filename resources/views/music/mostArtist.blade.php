@component('components.master')
    @isset($artists)
    <h1 class="text-color text-center">Top Ten Artist</h1>
    @foreach ($artists as $artist)
        <a href="/artist/{{ $artist->id }}">
          <h1 class="text-color">
            {{ $loop->index + 1 }} : {{ $artist->name }}
          </h1>  
        </a>
    @endforeach


    @endisset
@endcomponent
