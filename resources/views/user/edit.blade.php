@extends('layouts.app')
@section('content')



    <form method="post" action="{{route('user.update',$user->id)}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
    <div class="col-md-4">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{ asset('storage/rooms/' . $user->images) }}" alt="Card image cap">
            <div class="card-body">
                <div class="btn_avatar btn btn-success">
                    Upload Avatar
                    <input class="file_up" type="file" name="images"/>
                </div>
            </div>
        </div>
    </div>
    <div class="card bg-light mb-3 col-md-8">
        <div class="card-header "><h4><b style="color: #71bc42;text-align: center">Update Profile</b></h4></div>
        <div class="card-body">

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
    </div>
</div>
    </form>







@endsection
