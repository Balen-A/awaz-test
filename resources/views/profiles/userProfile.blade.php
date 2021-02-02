@component('components.master')
<div class="container">
    <div id="profileCard" class="card" style="width: 100%;">
       <h1 class="text-white">
    </h1>
        <div class="card-header text-4xl text-primary">
          {{ $user->name }}'s Profile
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <label class="text-bold text-primary text-2xl">Username : </label>
            {{ $user->name }}
        </li>
          <li class="list-group-item">
            <label class="text-bold text-primary text-2xl">First Name : </label>
            {{ $user->firstName }}
        </li>
          <li class="list-group-item">
            <label class="text-bold text-primary text-2xl">Last Name : </label>
            {{ $user->lastName }}
        </li>
          <li class="list-group-item">

            @if(auth()->user()->following($user))
                <h2 class=" text-primary "> Following </h2>
                @else
                <form action="/profiles/{{ $user->name}}/follow" method="post">
                    @csrf
                    <div class="form-group row">
                        <div class="col-1 mt-2">
                            <button class="btn btn-primary " type="submit" id="follow"> follow </button>
                        </div>
                    </div>
                </form>

            @endif
        </li>
        </ul>
      </div>
</div>
@endcomponent
