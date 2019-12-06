<!--header-->
<header class="site-navbar site-navbar-target" role="banner">

    <div class="container">
        <div class="row align-items-center position-relative">

            <div class="col-3 ">
                <div class="site-logo">
                    <a href="{{route('index')}}">Realtors</a>
                </div>
            </div>

            <div class="col-9  text-right">


                <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>



                <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                    <ul class="site-menu main-menu js-clone-nav ml-auto ">
                        <li class="active"><a href="{{route('index')}}" class="nav-link">Trang chủ</a></li>
                        {{--<li><a href="agents.html" class="nav-link">Agents</a></li>--}}
                        <li><a href="{{route('product')}}" class="nav-link">Sản phẩm</a></li>
                        <li><a href="{{route('about')}}" class="nav-link">Giới thiệu</a></li>
                        <li><a href="{{route('blog')}}" class="nav-link">Blog</a></li>
                        <li><a href="{{route('contact')}}" class="nav-link">Liên Hệ</a></li>
                    </ul>
                </nav>
            </div>


        </div>
    </div>

</header>
<!--header-->
<!--slice-->
<div class="ftco-blocks-cover-1">
    <div class="site-section-cover overlay" data-stellar-background-ratio="0.5" style="background-image: url('{{asset('source/images/hero_1.jpg')}}')">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <!--thông tin-->
                <div class="col-md-7">
                    {{--<span class="h4 text-primary mb-4 d-block">$1,570,000</span>--}}
                    <h1 class="mb-2">Beautiful House</h1>
                    <p class="text-center mb-5"><span class="small address d-flex align-items-center justify-content-center"> <span class="icon-room mr-3 text-primary"></span> <span>Hà Nội - Việt Nam</span></span></p>

                    <div class="d-flex media-38289 justify-content-around mb-5">
                        {{--<div class="sq d-flex align-items-center"><span class="wrap-icon icon-fullscreen">--}}
                                {{--</span> <span>2911 Sq Ft.</span></div>--}}
                        {{--<div class="bed d-flex align-items-center"><span class="wrap-icon icon-bed"></span> <span>2</span></div>--}}
                        {{--<div class="bath d-flex align-items-center"><span class="wrap-icon icon-bath"></span> <span>2</span></div>--}}
                        <div class="bed d-flex align-items-center"><span>BTH</span></div>
                    </div>
                    <p><a href="{{route('about')}}" class="btn btn-primary text-white px-4 py-3">Learn More</a></p>
                </div>
                <!---->
            </div>
        </div>
    </div>
</div>
<!--slice-->
