@extends('admin.layout.master')

@section('contentAdmin')
    <div class="card bg-light mt-4" style="width: 100%">
        <div class="card-header"><h5>Update Home</h5></div>
        <div class="card-body">
            <form method="post" action="{{route('house.update',$house->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                    <div class="form-group">
                        <label><h6>Title : </h6></label>
                        <input type="text" class="form-control
                            @if($errors->has('name'))
                            border-danger
@endif
                            " name="name" value="{{$house->name}}" placeholder="Nhập title">
                        @if($errors->has('name'))
                            <p style="color: red;">{{$errors->first('name')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label><h6>Địa chỉ : </h6></label>
                        <input type="text" class="form-control
                            @if($errors->has('address'))
                            border-danger
@endif
                            " name="address" value="{{$house->address}}" placeholder="Nhập địa chỉ">
                        @if($errors->has('address'))
                            <p style="color: red;">{{$errors->first('address')}}</p>
                        @endif
                    </div>
                    <div class="col-md-12 row">
                        <div class="col-md-3">
                            <div class="form-group"style="margin-top: 11px">
                                <h6>Trạng thái : </h6>
                                <select name="status" class="custom-select mr-sm-2">
                                    <option value="{{\App\StatusInterface::NHANPHONG}}"
                                            @if(\App\StatusInterface::NHANPHONG == $house->status)
                                            selected
                                        @endif
                                    >Khách đã tới
                                    </option>
                                    <option value="{{\App\StatusInterface::TRAPHONG}}"
                                            @if(\App\StatusInterface::TRAPHONG == $house->status)
                                            selected
                                        @endif
                                    >Khách đã trả phòng
                                    </option>
                                    <option value="{{\App\StatusInterface::SANSANG}}"
                                            @if(\App\StatusInterface::SANSANG == $house->status)
                                            selected
                                        @endif
                                    >Sẵn sàng cho thuê
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label><h6>Số lượng phòng ngủ : </h6></label>
                                <input type="number" class="form-control
                            @if($errors->has('bedrooms'))
                                    border-danger
@endif
                                    " name="bedrooms" value="{{$house->bedrooms}}" placeholder="Nhập số phòng ngủ">
                                @if($errors->has('bedrooms'))
                                    <p style="color: red;">{{$errors->first('bedrooms')}}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label><h6>Số lượng phòng tắm : </h6></label>
                                <input type="number" class="form-control
                            @if($errors->has('bathroom'))
                                    border-danger
@endif
                                    " name="bathroom" value="{{$house->bathroom}}" placeholder="Nhập số phòng tắm">
                                @if($errors->has('bathroom'))
                                    <p style="color: red;">{{$errors->first('bathroom')}}</p>
                                @endif
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label><h6>Giá tiền theo đêm : </h6></label>
                                <input type="number" class="form-control
                            @if($errors->has('price'))
                                    border-danger
@endif
                                    " name="price" value="{{$house->price}}" placeholder="Nhập giá phòng">
                                @if($errors->has('price'))
                                    <p style="color: red;">{{$errors->first('price')}}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><h6>Loại nhà :</h6></label>
                                <select name="house_category_id" class="custom-select mr-sm-2">
                                    @foreach($listHouseCategory as $houseType)
                                        <option value="{{$houseType->id}}"
                                            {{($houseType->id!==$house->house_category_id)? :"selected"}}
                                        >{{$houseType->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label><h6>Loại Phòng :</h6></label>
                                <select name="room_category_id" class="custom-select mr-sm-2">
                                    @foreach($listRoomCategory as $roomType)
                                        <option value="{{$roomType->id}}"
                                            {{($roomType->id!==$house->room_category_id)? :"selected"}}
                                        >{{$roomType->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label><h6>Thành phố :</h6></label>
                                <select name="cities_id" class="custom-select mr-sm-2" id="city_edit"
                                        onchange="changeCity(this.value);">
                                    @foreach($listCities as $city)
                                        <option value="{{$city->id}}"
                                            {{($city->id!==$house->cities_id)? :"selected"}}
                                        >{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label><h6>Quận huyện :</h6></label>
                                <select name="district_id" id="district_id" class="custom-select mr-sm-2">
                                    <option value="{{$house->district_id}}"
                                    >{{$house->district->name}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-8">
                            <label><h6>Mô tả : </h6></label>
                            <textarea class="form-control" name="description" rows="14"></textarea>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a class="btn btn-warning" href="{{route('admin.house',$house->id)}}">Back</a>
                </div>

            </form>
        </div>
    </div>

@endsection
