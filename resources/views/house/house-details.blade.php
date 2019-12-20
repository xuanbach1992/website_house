@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div id="demo" class="carousel "> <!--cho slide vào class để ảnh tự động chạy-->
                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img
                            src="{{asset('storage/'.$house->images[0]->path)}}" alt="Image"
                            class="img-fluid">
                    </div>
                    @foreach($house->images as $image)
                    <div class="carousel-item">
                        <img
                            src="{{asset('storage/'.$image->path)}}" alt="Image"
                            class="img-fluid">
                    </div>
                    @endforeach
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
        <div class="col-md-12 row mt-3">
            <div class="col-md-8">
                <div class="col-md-9 row">
                                <h4><b style="color: #0037ff ">{{$house->name}}</b></h4>
                                <b class="offset-4">Trạng thái :</b>
                                    @if(\App\StatusHouseInterface::CHUACHOTHUE == $house->status)
                                        <option>Chưa cho thuê</option>
                                    @elseif(\App\StatusHouseInterface::DACHOTHUE == $house->status)
                                        <option>Đã cho thuê</option>
                                    @else
                                        <option>Chờ xác nhận</option>
                                    @endif

                </div>
                <hr>

                <!--Thông tin chi tiết-->
                <div class="col-md-12">
                    <p style="font-size: 25px"><b>Thông tin chi tiết</b></p>
                </div>

                <!--Code mới-->
                <div class="col-md-12">

                    <div>
                        <h5><span class="fa fa-map-marker"> Địa chỉ : {{$house->address}} -
                            @foreach($listCities as $city)
                                @if($house->cities_id == $city->id)
                                    {{$city->name}}
                                @endif
                            @endforeach
                        </span></h5>
                    </div>

                    <div>
                        <h5><span class="far fa fa-home nav-icon"> Kiểu nhà :
                                @foreach($listHouseCategory as $houseType)
                                    @if($house->cities_id == $houseType->id)
                                        {{$houseType->name}} - 800 m2 -
                                    @endif
                                @endforeach

                                @foreach($listRoomCategory as $roomType)
                                    @if($house->cities_id == $roomType->id)
                                        {{$roomType->name}} - 50 m2 - Nguyên căn
                                    @endif
                                @endforeach
                        </span></h5>
                    </div>

                    <div>
                        <h5><span class="fa fa-s15"> Phòng tắm :
                                {{$house->bathroom}}
                        </span></h5>
                    </div>

                    <div>
                        <h5><span class="fa fa-bed"> Phòng ngủ :
                                {{$house->bedrooms}}
                        </span></h5>
                    </div>
                    <br>
                    <div>
                        <b class="fa fa-book"> THÔNG TIN PHÒNG ỐC :</b>
                            <p>- Tổng diện tích : 800 m2</p>
                            <p>- Không gian sống: 600 m2</p>
                            <p>- {{$house->bedrooms}} phòng ngủ (3 phòng ngủ chính và 1 phòng ngủ phụ)</p>
                            <p>- {{$house->bathroom}} phòng tắm</p>
                            <p>- 1 phòng cho người giúp việc/ hoặc tài xế có nhà tắm và WC riêng</p>
                            <p>- 1 nhà bếp lớn</p>
                            <p>- 1 phòng khách lớn</p>
                            <p>- Hồ bơi nước mặn riêng biệt</p>
                    </div>
                    <br>
                    <div>
                        <h5 class="fa fa-smile-o"><b> Mô tả : </b></h5>
                        <p style="font-size: 15px">{{$house->description}}</p>
                    </div>
                    <br>
                    <div>
                        <h5><b class="fa fa-legal"> Nội quy và chính sách về chỗ ở</b></h5>
                        <h6><b>Chính sách hủy phòng</b></h6>
                        <strong>Nghiêm ngặt:</strong>
                        Hoàn lại 50% giá trị đặt phòng khi khách hàng huỷ phòng trong vòng 48h sau khi đặt phòng thành công và trước 14 ngày so với thời gian check-in. Sau đó, hủy phòng trước 14 ngày so với thời gian check-in, được hoàn lại 50% tổng số tiền đã trả (trừ phí dịch vụ). Chi tiết
                    </div>
                    <br>
                    <div>
                        <h4> <b class="fa fa-exclamation"> Lưu ý đặc biệt</b></h4>
                        <h5>PHỤ THU (nếu phát sinh đi thêm người):</h5>
                        <b>- 1,000,000 VNĐ/đêm/ người lớn</b>
                        <b>- 500,000 VNĐ/đêm/ trẻ em từ 2 tuổi -> 12 tuổi/ đêm</b>
                        <b>- Sạch sẽ gọn gàng, ngăn nắp</b>
                        <b>- Không mang vật nuôi</b>
                        <b>- Không hút thuốc trong phòng</b>
                    </div>
                </div>
                <hr>
                <div class="col-md-12 row">
                    <a class="btn btn-primary btn-sm"
                       href="{{route('house.book',$house->id)}}"
                    >Booking</a>
                </div>
                <!--Code mới-->
                <!--End-->
                <hr>
            </div>

            <!--Thông tin chủ nhà-->
            <div class="col-md-4">
                {{--                <div class="card" style="width: 23rem;">--}}
                {{--                    <div class="card-body">--}}
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 mx-auto">
                            <div class="card card-signin my-5">
                                <div class="card-body">
                                    <h3><b>Thông Tin Chủ Nhà</b></h3>
                                    <hr>
                                    <p><b>Name :</b> {{$house->user->name}}</p>
                                    <p><b>Phone :</b> {{$house->user->phone}}</p>
                                    <p><b>Email :</b> {{$house->user->email}}</p>
                                    <p><b>Address :</b> {{$house->user->address}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End-->
        </div>
    </div>
    {{--    </div>--}}
    {{--    </div>--}}

@endsection
