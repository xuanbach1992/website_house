@extends('layouts.app')

@section('content')
    <div class="card bg-light mb-3">
        <div class="card-header"><h4><b style="color: #71bc42">Update Home</b></h4></div>
        <div class="card-body">
            <form method="post" action="{{route('house.update',$houses->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="row col-md-12">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><h6>Title  : </h6></label>
                            <input type="text" class="form-control
                            @if($errors->has('name'))
                                    border-danger
                            @endif
                                    " name="name" value="{{$houses->name}}" placeholder="Nhập title">
                            @if($errors->has('name'))
                                <p style="color: red;">{{$errors->first('name')}}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label><h6>Số điện thoại : </h6></label>
                            <input type="number" class="form-control" name="phone" value="{{$houses->phone}}" placeholder="Nhập số điện thoại">
                        </div>

                        <div class="form-group">
                            <h6>Trạng thái : </h6>
                                <div class="form-group">
                                    <input type="checkbox" id="status" class="filled-in" name="status" value="1">
                                    <label for="status"></label>
                                </div>
                            </label>

                        </div>
                        {{--<div class="form-group">--}}
                            {{--<label><h6>Loại nhà :</h6></label>--}}
                            {{--<select name="house_category_id" class="custom-select mr-sm-2">--}}
                                {{--@foreach($listHouseCategory as $houseType)--}}
                                    {{--<option value="{{$houseType->id}}">{{$houseType->name}}</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label><h6>Loại Phòng :</h6></label>--}}
                            {{--<select name="room_category_id" class="custom-select mr-sm-2">--}}
                                {{--@foreach($listRoomCategory as $roomType)--}}
                                    {{--<option value="{{$roomType->id}}">{{$roomType->name}}</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label><h6>Thành phố :</h6></label>--}}
                            {{--<select name="cities_id" class="custom-select mr-sm-2" onchange="onChange(this.value);">--}}
                                {{--<option>---ALL---</option>--}}
                                {{--@foreach($listCities as $city)--}}
                                    {{--<option value="{{$city->id}}">{{$city->name}}</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label><h6>Quận huyện :</h6></label>--}}
                            {{--<select name="district_id" class="custom-select mr-sm-2" id="district_id">--}}
                                {{--<option>---ALL---</option>--}}
                            {{--</select>--}}
                        {{--</div>--}}
                        <div class="form-group">
                            <label><h6>Địa chỉ : </h6></label>
                            <input type="text" class="form-control
                            @if($errors->has('address'))
                                    border-danger
                            @endif
                                    " name="address" value="{{$houses->address}}" placeholder="Nhập địa chỉ">
                            @if($errors->has('address'))
                                <p style="color: red;">{{$errors->first('address')}}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><h6>Số lượng phòng ngủ : </h6></label>
                            <input type="number" class="form-control
                            @if($errors->has('bedrooms'))
                                    border-danger
                            @endif
                                    " name="bedrooms" value="{{$houses->bedrooms}}" placeholder="Nhập số phòng ngủ">
                            @if($errors->has('bedrooms'))
                                <p style="color: red;">{{$errors->first('bedrooms')}}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label><h6>Số lượng phòng tắm : </h6></label>
                            <input type="number" class="form-control
                            @if($errors->has('bathroom'))
                                    border-danger
                            @endif
                                    " name="bathroom" value="{{$houses->bathroom}}" placeholder="Nhập số phòng tắm">
                            @if($errors->has('bathroom'))
                                <p style="color: red;">{{$errors->first('bathroom')}}</p>
                            @endif
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<label><h6>Mô tả : </h6></label>--}}
                            {{--<textarea class="form-control" name="description" rows="14"></textarea>--}}
                        {{--</div>--}}
                        <div class="form-group">
                            <label><h6>Giá tiền theo đêm : </h6></label>
                            <input type="number" class="form-control
                            @if($errors->has('price'))
                                    border-danger
                            @endif
                                    " name="price" value="{{$houses->price}}" placeholder="Nhập giá phòng">
                            @if($errors->has('price'))
                                <p style="color: red;">{{$errors->first('price')}}</p>
                            @endif
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a class="btn btn-warning" href="{{route('house.detail',$houses->id)}}">Back</a>
                </div>

            </form>
        </div>
    </div>

@endsection
