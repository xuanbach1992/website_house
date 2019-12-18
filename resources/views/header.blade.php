<!--header-->
<div id="app">
    <div class="modal fade" id="exampleModalLong_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
         aria-hidden="true">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Log in</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="card-title text-center">Sign In</h5>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-label-group">
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
                            <span class="input-group-addon">
                                    <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                </span>

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
                        <a class="btn btn-lg btn-google btn-block text-uppercase"><img
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


<header class="site-navbar site-navbar-target" role="banner" style="background-color:#1f6fb2;position: fixed;">
    <div class="container">
        @if(\Illuminate\Support\Facades\Session::has('success'))
            <div>
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ \Illuminate\Support\Facades\Session::get('success') }}</strong>
                </div>
            </div>
        @endif
        <div class="row align-items-center position-relative">
            <div class="col-3 ">
                <div class="site-logo">
                    <a href="{{route('index')}}">Realtors</a>
                </div>
            </div>

            <div class="col-9  text-right">

                <span class="d-inline-block d-lg-none"><a href="#"
                                                          class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span
                            class="icon-menu h3 text-white"></span></a></span>
                <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                    <ul class="site-menu main-menu js-clone-nav ml-auto ">
                        <li class="active"><a href="/" class="nav-link">Trang chủ</a></li>
                        <li><a href="#house_list" class="nav-link">Sản phẩm</a></li>
                        {{--                        <li><a href="{{route('about')}}" class="nav-link">Giới thiệu</a></li>--}}
                        {{--                        <li><a href="#" id="product" class="nav-link">Liên Hệ</a></li>--}}


                        <li class="nav-item">
                            @guest
                                <a class="nav-link" href="{{ route('login') }}" data-toggle="modal"
                                   data-target="#exampleModalLong_2" data-backdrop="static" data-keyboard="false">
                                    {{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                        @else
                            <li><a href="{{route('user.rent')}}" class="nav-link">Bài đăng</a></li>
                            <li><a href="{{route('house.showFormCreate')}}" class="nav-link">Create Home</a></li>
                            {{--                            {{dd(\App\Notification::all())}}--}}

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Message<span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @foreach(\App\Notification::all() as $notify)
                                        @if(json_decode($notify->data)->receive==\Illuminate\Support\Facades\Auth::user()->email)
                                            {{ json_decode($notify->data)->Message}}
                                        @endif
                                    @endforeach
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ \Illuminate\Support\Facades\Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <a class="dropdown-item"
                                       href="{{ route('user.edit')}}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('edit_user').submit();">
                                        {{ __('Edit Profile') }}
                                    </a>

                                    <a class="dropdown-item"
                                       href="{{ route('showChangePassword',\Illuminate\Support\Facades\Auth::user()->id)}}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('change_pass').submit();">
                                        {{ __('Change password') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>

                                    <form id="edit_user"
                                          action="{{ route('user.edit')}}"
                                          method="GET"
                                          style="display: none;">
                                        @csrf
                                    </form>

                                    <form id="change_pass"
                                          action="{{ route('showChangePassword',\Illuminate\Support\Facades\Auth::user()->id)}}"
                                          method="GET"
                                          style="display: none;">
                                        @csrf
                                    </form>


                                </div>
                            </li>
                        @endguest
                    </ul>

                </nav>
            </div>

        </div>
    </div>
</header>
<!--header-->


