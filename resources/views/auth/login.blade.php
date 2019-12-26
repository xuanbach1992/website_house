@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="modal-body">
                        <h5 class="card-title text-center">Sign In</h5>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-label-group input-group">
                                <input type="email" style="width: 97%" id="inputEmail" placeholder="Email"
                                       class="form-control @error('email') is-invalid @enderror" name="email"
                                       value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-label-group input-group" id="show_hide_password">
                                <input type="password" placeholder="Password"
                                       class="form-control password_show @error('password') is-invalid @enderror"
                                       name="password" required autocomplete="current-password">
                                <div class="input-group-append">
                              <span class="input-group-text">
                                    <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                </span>
                                </div>


                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group my-4">
                                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in
                                </button>
                                <button type="button" class="btn btn-lg btn-block text-uppercase btn-secondary"
                                        data-dismiss="modal">Cancel
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                            <hr class="my-4">
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-5">
                                    <a class=""><img src="https://img.icons8.com/color/48/000000/google-logo.png">
                                    </a>
                                    <a class="" href="redirect/facebook"><img src="https://img.icons8.com/color/48/000000/facebook-new.png">
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
