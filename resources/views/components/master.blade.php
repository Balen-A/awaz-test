<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/second.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body class="bg-black">
    @auth


    <div id="app">
        <section class="px-8">
            <header class="lg:w-5/6 mt-3 mx-auto">
                <nav class="navbar navbar-expand-lg navbar-dark bg-transparent ">
                    <a class="navbar-brand" href="/"><img src="/images/awazz.png" alt="awazz" width="131" height="65" srcset=""></a>
                    @auth
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                          <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                          <a class="nav-link" href="/genPlaylist">Generate Playlist<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                          <a class="nav-link" href="/friends">find Friends<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item ml-auto mr-4 dropdown dropright active">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if (Auth::check())
                                    {{ Auth::User()->name }} <span class="sr-only">(current)</span>
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">

                                  <a class="dropdown-item" href= " {{ Auth::User()->path('edit') }}">Edit Profile</a>
                                  <div class="dropdown-divider"></div>
                                  <a class="dropdown-item" href="{{ route('logout') }}">Log Out</a>
                                </div>
                            </li>
                        @endauth

                      </ul>

                    </div>
                  </nav>
            </header>

        </section>

        @endauth
        <section class="px-8 mt-3">
            <main class="w-100 mx-2">
                <div class="lg:flex lg:justify-center">
                    @auth

                    <div class="lg:w-32">
                        @include('_sidebar-links')
                    </div>
                    @endauth
                    <div class="lg:flex-1  lg:mx-10 lg:mb-10 style='max-width: 700px'">
                        {{ $slot }}
                    </div>
                    @auth

                    <div class="d-none d-lg-block lg:w-1/6 mr-2 ">
                        @include('_friends-list')
                    </div>
                    @endauth
                </div>
            </main>
        </section>
        {{-- <div class="container-fluid">
            {{ $slot }}
        </div> --}}
    </div>


    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script> --}}
    <script src="{{ asset('js/main.js') }}" type="text/javascript" ></script>

</body>
</html>
