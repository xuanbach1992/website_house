@extends('layouts.app')
@section('content')
{{--    <form method="post" action="{{route('user.update',$user->id)}}">--}}
{{--        @csrf--}}
{{--        <div class="form-group">--}}
{{--            <label>Email address</label>--}}
{{--            <input type="email" class="form-control" disabled value="{{$user->email}}">--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label>User Name</label>--}}
{{--            <input type="text" class="form-control" name="name" value="{{$user->name}}">--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label>Phone</label>--}}
{{--            <input type="text" class="form-control" name="phone" value="{{$user->phone}}">--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label>Address</label>--}}
{{--            <textarea class="form-control" rows="3" name="address">{{$user->address}}</textarea>--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <button class="btn btn-primary" type="submit">Update</button>--}}
{{--        </div>--}}
{{--    </form>--}}




    <div class="card bg-light mb-3 ">
        <div class="card-header row" ><h4><b style="color: #71bc42;text-align: center">Update Profile</b></h4></div>
        <div class="card-body">
            <form method="post" action="{{route('user.update',$user->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="row col-md-12">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label><h6>Email address</h6></label>
                            <input type="email" class="form-control" disabled value="{{$user->email}}">


                        </div>
                        <div class="form-group">
                            <label><h6>Name</h6></label>
                            <input type="text" class="form-control" name="name" value="{{$user->name}}">

                        </div>
                        <div class="form-group">
                            <label><h6>Phone </h6></label>
                            <input type="text" class="form-control" name="phone" value="{{$user->phone}}">

                        </div>

                        <div class="form-group">
                            <label><h6>Address </h6></label>
                            <textarea class="form-control" rows="3" name="address">{{$user->address}}</textarea>
                        </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Update</button>
                        <a class="btn btn-warning" href="{{route('index')}}">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>




@endsection
