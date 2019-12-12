<!doctype html>
<html lang="en">

<head>
    <title>House for rent</title>
    <meta charset="utf-8">
    <base href="{{asset('')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('source/fonts/icomoon/style.css')}}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{asset('js/ajax.js')}}"></script>


    <link rel="stylesheet" href="{{asset('source/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('source/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('source/css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('source/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('source/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('source/fonts/flaticon/font/flaticon.css')}}">
    {{--    <link rel="stylesheet" href="{{asset('source/css/aos.css')}}">--}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('source/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="{{asset('css/all.css')}}">
{{--    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">--}}
    <script src="{{asset('js/bootstrap.bundle.min.js')}}" defer></script>
    <script src="{{ asset('js/jquery.slim.min.js') }}" defer></script>
    <script !src="">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


<div class="site-wrap" id="home-section">

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>


            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>


    <!--header-->
{{--header ở đây--}}
@include('header')
<!--header-->

    <!--slice-->
{{--@cannot('register')--}}
@include('slice')
{{--@endcan--}}
<!--slice-->


    <!--homepage content-->
    {{--có 5 thẻ ở đây để hiển thị nội dung . --}}
    <main class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
    <!--homepage content-->


    <!--footer-->
@include('footer')
<!--footer-->

</div>

{{--<script src="{{asset('source/js/jquery-3.3.1.min.js')}}"></script>--}}
<script src="{{asset('source/js/jquery-migrate-3.0.0.js')}}"></script>
<script src="{{asset('source/js/popper.min.js')}}"></script>
<script src="{{asset('source/js/bootstrap.min.js')}}"></script>
<script src="{{asset('source/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('source/js/jquery.sticky.js')}}"></script>
<script src="{{asset('source/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('source/js/jquery.animateNumber.min.js')}}"></script>
<script src="{{asset('source/js/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('source/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('source/js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('source/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('source/js/aos.js')}}"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({selector:'textarea'});</script>

<script src="{{asset('source/js/main.js')}}"></script>
<script src="{{asset('js/app.js') }}"></script>
<script src="{{asset('js/main.js')}}"></script>
{!! toastr()->render() !!}
</body>

</html>
