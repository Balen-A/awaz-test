@component('components.master')
    @isset($song)
    <body onload="audio({{ $song[0] }})"></body>
    <?php
    $index=0;
    ?>
    
    <!-- <button type="button" class="btn btn-primary" onclick="play('{{ $song[0]->id }}','{{ $index }}' )"><i class="fas fa-play-circle"></i></button> -->
    <h2 class="text-white"> 
                {{ $song[0]->title }} by {{ App\Artist::where('id',$song[0]->artist_id)->get('name')[0]->name }}
    </h2>
  
    @endisset
@endcomponent
