@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Sign In</h5>
                        <form class="form-signin" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-label-group">
                                <input type="email" style="width: 95.5%" id="inputEmail" placeholder="Email"
                                       class="form-control @error('email') is-invalid @enderror" name="email"
                                       value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-label-group input-group"  id="show_hide_password">
                                <input type="password" placeholder="Password" class="form-control password_show @error('password') is-invalid @enderror"
                                       name="password" required autocomplete="current-password">
                                <span class="input-group-addon">
                                    <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                </span>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in
                            </button>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                            <hr class="my-4">
                            <a class="btn btn-lg btn-google btn-block text-uppercase" ><img
                                    src="https://img.icons8.com/color/20/000000/google-logo.png"> Sign in with Google
                            </a>
                            <a class="btn btn-lg btn-facebook btn-block text-uppercase" href="redirect/facebook"><img
                                    src="https://img.icons8.com/color/20/000000/facebook-new.png"> Sign in with Facebook
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
