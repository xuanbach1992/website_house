<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Dashboard</title>
    <base href="{{asset('')}}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('sourceAdmin/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
          href="{{asset('sourceAdmin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('sourceAdmin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('sourceAdmin/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('sourceAdmin/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('sourceAdmin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('sourceAdmin/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('sourceAdmin/plugins/summernote/summernote-bs4.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        .btn {
            border-radius: 45px !important;
        }
    </style>
    <link rel="stylesheet" href="{{asset('source/css/admin.page.css')}}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="{{asset('https://code.jquery.com/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('https://code.highcharts.com/highcharts.js')}}"></script>
    <script src="{{asset('https://code.highcharts.com/modules/exporting.js')}}"></script>
    <script src="{{asset('https://code.highcharts.com/modules/export-data.js')}}"></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar để lại -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Home</a>
            </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge"><?php $countNotice = 0 ?>
                        @foreach (\App\Notification::all() as $notice)
                            @if(json_decode($notice->data)->receive == auth()->user()->email)
                                <?php $countNotice++ ?>
                            @endif
                        @endforeach
                    ({{$countNotice}})</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header"><?php $countNotice = 0 ?>
                        @foreach (\App\Notification::all() as $notice)
                            @if(json_decode($notice->data)->receive == auth()->user()->email)
                                <?php $countNotice++ ?>
                            @endif
                        @endforeach
                    ({{$countNotice}}) Notifications</span>
                    @foreach(\App\Notification::all() as $notify)
                        @if(json_decode($notify->data)->receive==\Illuminate\Support\Facades\Auth::user()->email)
                            <div class="dropdown-divider"></div>
                            <a href="{{route('admin.notify.show')}}" class="dropdown-item">
                                {{json_decode($notify->data)->sender}}
                                {{--                        <span class="float-right text-muted text-sm">3 mins</span>--}}
                            </a>

                        @endif
                    @endforeach
                </div>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container hiệp -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo  để lại-->
        <a href="{{route('admin.house')}}" class="brand-link">
            <img src="sourceAdmin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text">{{\Illuminate\Support\Facades\Auth::user()->name}} Pages</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <a href="{{route('user.edit')}}">
                        <img style="width: 150px;height:150px" src="

                        @if(!\Illuminate\Support\Facades\Auth::user()->images)
                            source/images/avatar.jpeg
@else
                        {{ asset('storage/rooms/'. \Illuminate\Support\Facades\Auth::user()->images) }}
                        @endif
                            " class="img-circle elevation-2" alt="User Image"></a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Manage
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.house')}}" class="nav-link active">
                                    <i class="far fa fa-home nav-icon"></i>
                                    <p>Nhà Của Tôi</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.notify.show')}}" class="nav-link">
                                    <i class="far fa fa-bullhorn nav-icon"></i>
                                    <p>Thông Báo</p><?php $countNotice = 0 ?>
                                    @foreach (\App\Notification::all() as $notice)
                                        @if(json_decode($notice->data)->receive == auth()->user()->email)
                                            <?php $countNotice++ ?>
                                        @endif
                                    @endforeach
                                ({{$countNotice}})
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.house.rented')}}" class="nav-link">
                                    <i class="far fa fa-home nav-icon"></i>
                                    <p>Lịch sử thuê nhà</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-header">Website</li>
                    <li class="nav-item">
                        <a href="{{route('index')}}" class="nav-link">
                            <i class="nav-icon fas fa-link"></i>
                            <p>Beautiful House</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) hiệp -->
    {{--<div class="content-header">--}}
    {{--<div class="container-fluid">--}}
    {{--<div class="row mb-2">--}}
    {{--<div class="col-sm-6">--}}
    {{--<h1 class="m-0 text-dark">Trang quản lý</h1>--}}
    {{--</div><!-- /.col -->--}}
    {{--<div class="col-sm-6">--}}
    {{--<ol class="breadcrumb float-sm-right">--}}
    {{--<li class="breadcrumb-item"><a href="#">Trang chủ</a></li>--}}
    {{--<li class="breadcrumb-item active">Dashboard v1</li>--}}
    {{--</ol>--}}
    {{--</div><!-- /.col -->--}}
    {{--</div><!-- /.row -->--}}
    {{--</div><!-- /.container-fluid -->--}}
    {{--</div>--}}
    <!-- /.content-header -->

        <div class="container">
            <div class="row col-md-12">
                @yield('contentAdmin')
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Main row -->
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
{{--    <footer class="main-footer">--}}
{{--        <strong>Người tạo : <a href="#">Trần Mạnh Hiệp</a>.</strong>--}}
{{--    </footer>--}}

<!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="sourceAdmin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="sourceAdmin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>


<!-- Bootstrap 4 -->
<script src="{{asset('')}}sourceAdmin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('')}}sourceAdmin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline  js drop down notify-->
<script src="{{asset('sourceAdmin/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
{{--<script src="{{asset('sourceAdmin/plugins/jqvmap/jquery.vmap.min.js')}}"></script>--}}
{{--<script src="{{asset('sourceAdmin/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>--}}
<!-- jQuery Knob Chart -->
<script src="{{asset('sourceAdmin/plugins/jquery-knob/jquery.knob.min.j')}}s"></script>
<!-- daterangepicker -->
<script src="{{asset('sourceAdmin/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('sourceAdmin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('sourceAdmin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('sourceAdmin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('sourceAdmin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('sourceAdmin/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('sourceAdmin/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('sourceAdmin/dist/js/demo.js')}}"></script>
<script src="{{asset('js/ajax.page.user.js')}}"></script>
<script>
    $(document).ready(function () {
        $(".showReasonDelRent").click(function () {
            let idOrder = $(this).data('id');
            $('.idHouseBooking').val(idOrder);
        });
    });
</script>


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function changeCity(id) {
        $.ajax({
            method: "GET",
            url: 'http://127.0.0.1:8000/getDataByCitiesId',
            dataType: "json",
            data: {
                id: id,
            },
            success: function (res) {
                $('#district_id').empty();
                $.each(res.data, function (i, item) {
                    $('#district_id').append($('<option>', {
                        value: item.id,
                        text: item.name
                    }));
                });
            },
            error: function (res) {
                alert(res.message);
            }
        })
    }
</script>
</body>
</html>
