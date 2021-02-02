
<h2 class="font-bold text-color text-xl mb-4">Following</h2>
<ul>
    @if (Auth::check())
        @foreach (auth()->user()->follows()->get() as $user)
        <li class="mb-4 text-white ">
            <div class="flex item-center text-sm">
            {{-- <img src="{{ asset('images/avatar.png') }}" --}}
                {{-- class="rounded-full mr-2" --}}
                {{-- alt="AWAZZ"> --}}
                <h6>
                   {{-- <a href="/friends/{{ $user->id }}" class="text-primary"> --}}
                   <a href="{{ url('friends/'. $user->id) }}" class="text-white">
                       {{ $user->name }}
                    </a>
                </h6>
            {{-- </div> --}}
        </li>
        @endforeach
    @endif
</ul>
