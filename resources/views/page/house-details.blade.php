@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div id="demo" class="carousel "> <!--cho slide vào class để ảnh tự động chạy-->
                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="source/images/hero_1.jpg" alt="Los Angeles">
                    </div>
                    <div class="carousel-item">
                        <img src="source/images/img_2.jpg" alt="Chicago">
                    </div>
                    <div class="carousel-item">
                        <img src="source/images/hero_3.jpg" alt="New York">
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
        <div class="col-md-12 mt-3">
            <div class="col-md-8">
                <div>
                    <h3 style="color: #ff6c5e "><b>{{$house->name}}</b></h3>
                </div>
                <hr>
                <div class="col-md-12 row">
                    <div class="mt-3 col-md-4">
                        <p><b>Giá :</b></p>
                        <p>{{$house->price}}</p>
                    </div>
                    <div class="mt-3 col-md-4">
                        <p><b>Địa chỉ :</b></p>
                        <p>{{$house->address}} -
                            @foreach($listCities as $city)
                                @if($house->cities_id == $city->id)
                                    {{$city->name}}
                                @endif
                            @endforeach
                        </p>
                    </div>
                    <div class="mt-3 col-md-4">
                        <p><b>Số Điện Thoại :</b></p>
                        <p>{{$house->phone}}</p>
                    </div>
                </div>
                <hr>
                <div class="col-md-12">
                    <p style="font-size: 25px"><b>Thông tin chi tiết</b></p>
                </div>
                <div class="col-md-12 row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>
                                <h6>Kiểu nhà :
                                    @foreach($listHouseCategory as $houseType)
                                        @if($house->cities_id == $houseType->id)
                                            {{$houseType->name}}
                                        @endif
                                    @endforeach
                                </h6>
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                <label>
                                    <h6>Kiểu phòng :
                                        @foreach($listRoomCategory as $roomType)
                                            @if($house->cities_id == $roomType->id)
                                                {{$roomType->name}}
                                            @endif
                                        @endforeach
                                    </h6>
                                </label>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><h6>Số lượng phòng ngủ : {{$house->bedrooms}}</h6></label>
                        </div>
                        <div class="form-group">
                            <label><h6>Số lượng phòng tắm : {{$house->bathroom}}</h6></label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <h6>Mô tả : </h6>
                        <p style="font-size: 15px">{{$house->description}}</p>
                    </div>

                </div>
                <hr>
            </div>
        </div>
    </div>

@endsection
