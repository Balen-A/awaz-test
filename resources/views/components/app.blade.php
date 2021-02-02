@component('components.master')
    <section class="px-8 mt-3">
        <main class="w-screen mx-2">
            <div class="lg:flex lg:justify-center">
                <div class="lg:w-32">
                    @include('_sidebar-links')
                </div>
                <div class="lg:flex-1  lg:mx-10 lg:mb-10 style='max-width: 700px'">
                    {{-- @include('music._nowPlaying') --}}
                    {{-- @include('profiles.show') --}}
                    {{-- {{ $slot }} --}}
                </div>
                <div class="d-none d-lg-block lg:w-1/6 mr-2">
                    @include('_friends-list')
                </div>
            </div>
        </main>
    </section>
@endcomponent

