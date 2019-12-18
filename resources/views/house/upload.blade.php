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


    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>


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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css">


    <link rel="stylesheet" href="{{asset('css/all.css')}}">
    {{--    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">--}}
    <script src="{{asset('js/bootstrap.bundle.min.js')}}" defer></script>
    {{--    <script src="{{ asset('js/jquery.slim.min.js') }}" defer></script>--}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</head>
<body>

<div>
    @include('header')
</div>
<div class="container">
    <h2 style="color: white">Đăng nhiều ảnh để dễ bán hơn</h2><br/>
    <form method="post" action="{{route('house.upload')}}" enctype="multipart/form-data"
          class="dropzone mt-5" id="dropzone" name="file">
        @csrf
    </form>
    <div>
        <a class="btn btn-secondary" id="uploadfiles" href="{{route('index')}}" type="submit">Upload</a>
    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>
<script type="text/javascript">
    Dropzone.autoDiscover = false;

    let myDropzone = new Dropzone(".dropzone", {
            autoProcessQueue: false,
            maxFilesize: 10,
            parallelUploads: 10,
            renameFile: function (file) {
                var dt = new Date();
                var time = dt.getTime();
                return time + file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 60000,
            success: function (file, response) {
                console.log(response);
            },
            error: function (file, response) {
                return false;
            }
        },
        $('#uploadfiles').click(function(){
            myDropzone.processQueue();
        }))
</script>
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
<script>tinymce.init({selector: 'textarea'});</script>

<script src="{{asset('source/js/main.js')}}"></script>
<script src="{{asset('js/app.js') }}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/ajax.js')}}"></script>
{!! toastr()->render() !!}
</body>

</html>
