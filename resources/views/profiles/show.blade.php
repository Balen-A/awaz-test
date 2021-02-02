@component('components.master')
{{-- <div class="container"> --}}
    {{-- <div class="lg:flex">
        <div class="lg:w-1/4" >
            @include('_sidebar-links')

        </div> --}}
        <div class="lg:flex-1">
            <h1 class="text-color text-center" type="submit">Find New Friends </h1>
            @foreach (auth()->user()->listUsers()->get() as $user)
                @unless (auth()->user()->is($user))
                     @if (!(auth()->user()->following($user)))
                        <form action="/profiles/{{ $user->name}}/follow" method="post">
                            @csrf
                            <div class="form-group row">
                                <div class="col-2">

                                    <label for="follow" class="col-form-label"><a href="{{ url('friends/'. $user->id) }}"><h3 class="text-white"> {{ $user->name }}</h3></a></label>
                                </div>
                                <div class="col-1 mt-2">
                                    <button class="btn btn-primary " type="submit" id="follow"> follow </button>
                                </div>
                            </div>
                        </form>
                     @endif
                @endunless
            @endforeach
            <hr class="text-color">
            <h1 class="text-color text-center" type="submit">Your Friends </h1>
            @foreach (auth()->user()->listUsers()->get() as $user)
                @unless (auth()->user()->is($user))
                     @if (auth()->user()->following($user))
                        <form action="/profiles/{{ $user->name}}/unfollow" method="post">
                            @csrf
                            <div class="form-group row">
                                <div class="col-2">
                                    <label for="follow" class="col-form-label"><a href="{{ url('friends/'. $user->id) }}"><h3 class="text-white"> {{ $user->name }}</h3></a></label>
                                </div>
                                <div class="col-1 mt-2">
                                    <button class="btn btn-primary " type="submit" id="unfollow"> unfollow </button>
                                </div>
                            </div>
                        </form>
                    @endif
                @endunless
            @endforeach
        </div>
        {{-- <div class="lg:w-1/4" >
            @include('_friends-list')
        </div> --}}
{{-- </div> --}}
@endcomponent
