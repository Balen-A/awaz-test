@component('components.master')
    <div class="container">
        <div id="profileCard" class="card" style="width: 100%;">
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
                <label class="text-bold text-primary text-2xl">Email : </label>
                {{ $user->email }}
              </li>
              <li class="list-group-item">
                <label class="text-bold text-primary text-2xl">Account Created : </label>
                {{ $user->created_at }}
              </li>
              <li class="list-group-item">
                <button class="btn btn-primary" onclick="editProfile()"> Edit Profile</button>
              </li>
            </ul>
          </div>
          <div id="editProfile" style="display: none;">
            <button class="btn btn-primary " onclick="editProfile()"><i class="fas fa-long-arrow-alt-left"></i></button>
            <form method="POST" action="/updateProfile">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-white text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="firstName" class="col-md-4 col-form-label text-white text-md-right">{{ __('First Name') }}</label>

                    <div class="col-md-6">
                        <input id="firstName" type="text" class="form-control " name="firstName"  >

                    </div>
                </div>
                <div class="form-group row">
                    <label for="lastName" class="col-md-4 col-form-label text-white text-md-right">{{ __('Last Name') }}</label>

                    <div class="col-md-6">
                        <input id="lastName" type="text" class="form-control" name="lastName">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class=" text-white col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class=" text-white col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class=" text-white  col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Update Profile') }}
                        </button>
                    </div>
                </div>
            </form>
            </div>
    </div>


@endcomponent
