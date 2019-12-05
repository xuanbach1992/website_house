@extends('layouts.app')
@section('content')
    <form method="post" action="{{route('user.update',$user->id)}}">
        @csrf
        <div class="form-group">
            <label>Email address</label>
            <input type="email" class="form-control" disabled value="{{$user->email}}">
        </div>
        <div class="form-group">
            <label>User Name</label>
            <input type="text" class="form-control" name="name" value="{{$user->name}}">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
        </div>
        <div class="form-group">
            <label>Address</label>
            <textarea class="form-control" rows="3" name="address">{{$user->address}}</textarea>
        </div>
        <div>
            <button class="btn btn-primary" type="submit">Update</button>
        </div>
    </form>
@endsection
