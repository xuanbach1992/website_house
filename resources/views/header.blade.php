<!--header-->
<div id="app">
    <div class="modal fade" id="exampleModalLong_2" role="dialog" aria-labelledby="exampleModalLongTitle"
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
                        <div class="form-label-group  input-group">
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
                                <a class="" href="redirect/facebook"><img
                                        src="https://img.icons8.com/color/48/000000/facebook-new.png">
                                </a>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<header class="site-navbar site-navbar-target" role="banner" style="background-color:#00040b42;position: fixed;">
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
                    <a href="{{route('index')}}">Friendly</a>
                </div>
            </div>

            <div class="col-9  text-right">

                <span class="d-inline-block d-lg-none"><a href="#"
                                                          class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span
                            class="icon-menu h3 text-white"></span></a></span>
                <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                    <ul class="site-menu main-menu js-clone-nav ml-auto ">
                        <li><a href="/" class="nav-link">Trang chủ</a></li>
                        {{--                        <li><a href="#house_list" class="nav-link">Sản phẩm</a></li>--}}
                        {{--                        <li><a href="{{route('about')}}" class="nav-link">Giới thiệu</a></li>--}}
                        {{--                        <li><a href="#" id="product" class="nav-link">Liên Hệ</a></li>--}}


                        <li class="nav-item">
                            @guest
                                <a class="nav-link" href="{{ route('login') }}"
                                   data-toggle="modal"
                                   data-target="#exampleModalLong_2" data-backdrop="static" data-keyboard="false"
                                >
                                    {{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                        @else

                            <li><a href="{{route('admin.house')}}" class="nav-link">Trang Quản Lý</a></li>

                            <li><a href="{{route('house.showFormCreate')}}" class="nav-link">Cho Thuê Nhà</a></li>

                            {{--                            {{dd(\App\Notification::all())}}--}}

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link fa fa-bell"
                                   data-toggle="dropdown"
                                   style="font-size:24px" href="{{route('admin.notify.show')}}" role="button"
                                >
                                    <span class="caret badge">
<?php $countNotice = 0 ?>
                                        @foreach (\App\Notification::all() as $notice)
                                            @if(json_decode($notice->data)->receive == auth()->user()->email)
                                                <?php $countNotice++ ?>
                                            @endif
                                        @endforeach
                                    ({{$countNotice}})
                                    </span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" style="width: 300px"
                                     aria-labelledby="navbarDropdown">
                                    @foreach(\App\Notification::all() as $notify)
                                        @if(json_decode($notify->data)->receive==\Illuminate\Support\Facades\Auth::user()->email&&
$notify->type==='App\Notifications\SendNotificationToHouseHost')
                                            &nbsp Yêu cầu đặt phòng bởi
                                            {{json_decode($notify->data)->sender}}
                                            <a href="{{route('admin.notify.show')}}">
                                                Xem thông báo
                                            </a><br>
                                        @elseif(json_decode($notify->data)->receive==\Illuminate\Support\Facades\Auth::user()->email&&
$notify->type==='App\Notifications\NoAcceptRent')
                                            &nbsp Đặt phòng thất bại
                                            <a style="color: black" href="{{route('admin.notify.show')}}">
                                                Xem thông báo
                                            </a><br>
                                        @elseif(json_decode($notify->data)->receive==\Illuminate\Support\Facades\Auth::user()->email&&
$notify->type==='App\Notifications\AcceptRentHouse')
                                            &nbsp Đặt phòng thành công
                                            <a style="color: black" href="{{route('admin.notify.show')}}">
                                                Xem thông báo
                                            </a><br>
                                        @elseif(json_decode($notify->data)->receive==\Illuminate\Support\Facades\Auth::user()->email&&
$notify->type==='App\Notifications\ReplyComment')
                                            <a class="read_comment" style="color: black"
                                               href="{{url('/houses/detail/'.json_decode($notify->data)->house_id)}}">
                                                {{json_decode($notify->data)->sender}} đã trả lời đánh giá của bạn về
                                                ...
                                            </a>
                                            <input type="text" class="notification_id" value="{{$notify->uid}}" readonly="readonly" style="display: none">
                                            <span
                                                style="font-size: 10px;float: right">{{$notify->created_at->diffForHumans(\Carbon\Carbon::now())}}</span>
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

                                    <a class="dropdown-item"
                                       href="{{route('admin.house')}}">

                                        {{ __('Trang Quản Lý') }}
                                    </a>
                                    <a class="dropdown-item"
                                       href="{{ route('user.edit')}}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('edit_user').submit();">
                                        {{ __('Thay đổi thông tin') }}
                                    </a>

                                    <a class="dropdown-item"
                                       href="{{ route('showChangePassword',\Illuminate\Support\Facades\Auth::user()->id)}}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('change_pass').submit();">
                                        {{ __('Đổi mật khẩu') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Đăng xuất') }}
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


