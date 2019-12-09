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
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email"
                                   class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
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
                        <li><a href="{{route('product')}}" class="nav-link" >Sản phẩm</a></li>
                        <li><a href="{{route('about')}}" class="nav-link">Giới thiệu</a></li>
                        <li><a href="{{route('blog')}}" class="nav-link">Blog</a></li>
                        <li><a href="#"  id="product" class="nav-link">Liên Hệ</a></li>



                        <li class="nav-item">
                            @guest
                                <a class="nav-link" href="{{ route('login') }}" data-toggle="modal"
                                   data-target="#exampleModalLong_2">
                                    {{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                        @else
                            <li><a href="{{route('house.showFormCreate')}}" class="nav-link">Create Home</a></li>
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
                                       href="{{ route('user.edit',\Illuminate\Support\Facades\Auth::user()->id)}}"
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
                                          action="{{ route('user.edit',\Illuminate\Support\Facades\Auth::user()->id)}}"
                                          method="POST"
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


