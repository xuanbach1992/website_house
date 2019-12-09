@extends('layouts.app')

@section('content')
    <div class="card bg-light mb-3">
        <div class="card-header" ><h4><b style="color: #71bc42">Create Home</b></h4></div>
        <div class="card-body">
            <form method="post" action="{{route('house.add')}}" enctype="multipart/form-data">
                @csrf
                <div class="row col-md-12">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><h6>Tên chủ nhà : </h6></label>
                            <input type="text" class="form-control
                            @if($errors->has('name'))
                                    border-danger
                            @endif
                            " name="name" placeholder="Nhập tên chủ nhà">
                            @if($errors->has('name'))
                                <p style="color: red;">{{$errors->first('name')}}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label><h6>Loại nhà : </h6></label>
                            <input type="text" class="form-control
                            @if($errors->has('house_type'))
                                    border-danger
                            @endif
                            " name="house_type" placeholder="Nhập loại nhà">
                            @if($errors->has('house_type'))
                                <p style="color: red;">{{$errors->first('house_type')}}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label><h6>Loại phòng : </h6></label>
                            <input type="text" class="form-control
                            @if($errors->has('room_type'))
                                    border-danger
                            @endif
                            " name="room_type" placeholder="Nhập loại phòng">
                            @if($errors->has('room_type'))
                                <p style="color: red;">{{$errors->first('room_type')}}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label><h6>Địa chỉ : </h6></label>
                            <input type="text" class="form-control
                            @if($errors->has('address'))
                                    border-danger
                            @endif
                            " name="address" placeholder="Nhập địa chỉ">
                            @if($errors->has('address'))
                                <p style="color: red;">{{$errors->first('address')}}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label><h6>Số lượng phòng ngủ : </h6></label>
                            <input type="text" class="form-control
                            @if($errors->has('bedrooms'))
                                    border-danger
                            @endif
                            " name="bedrooms" placeholder="Nhập số phòng ngủ">
                            @if($errors->has('bedrooms'))
                                <p style="color: red;">{{$errors->first('bedrooms')}}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><h6>Số lượng phòng tắm : </h6></label>
                            <input type="text" class="form-control
                            @if($errors->has('bathroom'))
                                    border-danger
                            @endif
                            " name="bathroom" placeholder="Nhập số phòng tắm">
                            @if($errors->has('bathroom'))
                                <p style="color: red;">{{$errors->first('bathroom')}}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label><h6>Ảnh phòng : </h6></label>
                            <input type="file" name="image" class="custom-file">
                        </div>
                        <div class="form-group">
                            <label><h6>Mô tả : </h6></label>
                            <textarea class="form-control" name="description" rows="7"></textarea>
                        </div>
                        <div class="form-group">
                            <label><h6>Giá tiền theo đêm : </h6></label>
                            <input type="text" class="form-control
                            @if($errors->has('price'))
                                    border-danger
                            @endif
                            " name="price" placeholder="Nhập giá phòng">
                            @if($errors->has('price'))
                                <p style="color: red;">{{$errors->first('price')}}</p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        &nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-primary">Create</button>&nbsp;&nbsp;
                        <a class="btn btn-warning" href="{{route('index')}}">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{--<div class="col-lg-8">
        <form method="post" action="{{route('house.add')}}">
            @csrf
            <div class="form-group">
                <label><h6>Tên chủ nhà : </h6></label>
                <input type="text" class="form-control
                @if($errors->has('name'))
                        border-danger
                @endif
                        " name="name" placeholder="Nhập tên chủ nhà">
                @if($errors->has('name'))
                    <p style="color: red;">{{$errors->first('name')}}</p>
                @endif
            </div>
            <div class="form-group">
                <label><h6>Loại nhà : </h6></label>
                <input type="text" class="form-control
                @if($errors->has('house_type'))
                        border-danger
                @endif
                        " name="house_type" placeholder="Nhập loại nhà">
                @if($errors->has('house_type'))
                    <p style="color: red;">{{$errors->first('house_type')}}</p>
                @endif
            </div>
            <div class="form-group">
                <label><h6>Loại phòng : </h6></label>
                <input type="text" class="form-control
                @if($errors->has('room_type'))
                        border-danger
                @endif
                        " name="room_type" placeholder="Nhập loại phòng">
                @if($errors->has('room_type'))
                    <p style="color: red;">{{$errors->first('room_type')}}</p>
                @endif
            </div>
            <div class="form-group">
                <label><h6>Địa chỉ : </h6></label>
                <input type="text" class="form-control
                @if($errors->has('address'))
                        border-danger
                @endif
                        " name="address" placeholder="Nhập địa chỉ">
                @if($errors->has('address'))
                    <p style="color: red;">{{$errors->first('address')}}</p>
                @endif
            </div>
            <div class="form-group">
                <label><h6>Số lượng phòng ngủ : </h6></label>
                <input type="text" class="form-control
                @if($errors->has('bedrooms'))
                        border-danger
                @endif
                        " name="bedrooms" placeholder="Nhập số phòng ngủ">
                @if($errors->has('bedrooms'))
                    <p style="color: red;">{{$errors->first('bedrooms')}}</p>
                @endif
            </div>
            <div class="form-group">
                <label><h6>Số lượng phòng tắm : </h6></label>
                <input type="text" class="form-control
                @if($errors->has('bathroom'))
                        border-danger
                @endif
                        " name="bathroom" placeholder="Nhập số phòng tắm">
                @if($errors->has('bathroom'))
                    <p style="color: red;">{{$errors->first('bathroom')}}</p>
                @endif
            </div>
            <div class="form-group">
                <label><h6>Ảnh phòng : </h6></label>
                <input type="file" class="form-control">
            </div>
            <div class="form-group">
                <label><h6>Mô tả : </h6></label>
                <textarea class="form-control" name="description" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label><h6>Giá tiền theo đêm : </h6></label>
                <input type="text" class="form-control
                @if($errors->has('price'))
                        border-danger
                @endif
                        " name="price" placeholder="Nhập giá phòng">
                @if($errors->has('price'))
                    <p style="color: red;">{{$errors->first('price')}}</p>
                @endif
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>--}}

@endsection
