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
                    {{--                    <div class="carousel-item">--}}
                    {{--                        <img--}}
                    {{--                            src="{{asset('storage/'.$house->images[2]->path)}}" alt="Image"--}}
                    {{--                            class="img-fluid">--}}
                    {{--                    </div>--}}
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
                <div class="row">
                    <div class="col-md-9">
                        <h3>
                            <b style="color: #ff6c5e ">{{$house->name}}</b> -
                            @if($house->status == 1)
                                <span style="color: #000000;">Đã cho thuê</span>
                            @else
                                <span style="color: #bd362f">Chưa cho thuê</span>
                            @endif
                        </h3>
                    </div>
                    @can('userAuthorization')
                        <div class="col-md-3">
                            <a href="{{route('house.showEdit',$house->id)}}" class="btn btn-primary">Sửa</a> &nbsp;
                            <a href="{{route('house.delete',$house->id)}}" class="btn btn-danger">Xóa</a>
                        </div>
                    @endcan
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
                    {{--                    <a class="btn btn-primary btn-sm"--}}
                    {{--                       href="{{route('house.book',$house->user_id)}}"--}}
                    {{--                    >Booking</a>--}}

                </div>
                <hr>
                <div class="col-md-12">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 mx-auto">
                                <div class="card card-signin my-5">
                                    <div class="card-body">
                                        <h3><b>Đánh Giá Sản Phẩm</b></h3>
                                        <hr>
                                        <div class="compolent_rating_content" style="display: flex;align-items:center">
                                            <div class="rating_item" style="width: 20%;margin: 0 20px">
                                                <span class="fa fa-star"
                                                      style="font-size: 60px;color: #ff9705;margin: 0 auto; text-align: center;">

                                                    {{round($starMedium,1)}}
                                                </span>
                                            </div>

                                            <div class="list_rating" style="width: 60%;padding: 20px">
                                                @for($i = 1 ;$i<=5;$i++)
                                                    <div class="item_rating" style="display: flex;align-items: center">
                                                        <div style="width: 20%;">
                                                            {{$i }} <span class="fa fa-star"></span>
                                                        </div>
                                                        <div style="width: 70%;margin: 0 20px;">
                                                    <span
                                                        style="width: 100%;height: 8px;display: block;border: 1px solid #dedede;border-radius: 5px;background-color:#dedede "><b
                                                            style="width: 50%;background-color: #f25800;display: block;height: 100%;border-radius: 5px"></b></span>
                                                        </div>
                                                        <div style="width: 10%;">
                                                            <a href="">10 </a>
                                                        </div>
                                                    </div>
                                                @endfor
                                            </div>

                                        </div>
                                        <hr>

                                        <form action="{{route('house.rating',$house->id)}}" method="post">
                                            @csrf
                                            <div style="display: flex; margin-top: 15px;font-size: 15px" class="hide">
                                                <p style="margin-bottom: 0">Đánh Giá Của Bạn:</p>

                                                <div style="margin:0;padding:0;" id="rating">
                                                    <input type="radio" id="star5" name="rating" value="5"/>
                                                    <label style="margin:0;padding:0;" class="full" for="star5"></label>
                                                    <input type="radio" id="star4" name="rating" value="4"/>
                                                    <label style="margin:0;padding:0;" class="full" for="star4"></label>
                                                    <input type="radio" id="star3" name="rating" value="3"/>
                                                    <label style="margin:0;padding:0;" class="full" for="star3"></label>
                                                    <input type="radio" id="star2" name="rating" value="2"/>
                                                    <label style="margin:0;padding:0;" class="full" for="star2"></label>
                                                    <input type="radio" id="star1" name="rating" value="1"/>
                                                    <label style="margin:0;padding:0;" class="full"
                                                           for="star1"></label>


                                                </div>
                                                <span class="list_text"></span>

                                            </div>
                                            <div>
                                                <input class="form-control" name="contents">
                                                <button type="submit"
                                                        class="btn btn-primary js_rating_house">Gửi đánh giá
                                                </button>
                                            </div>
                                        </form>

                                        <hr>
                                        <div class="mt-5">
                                            <h3><b>Tất Cả Đánh Giá </b></h3>
                                            @foreach($listStar as $star)
                                                @if($star->house_id==$house->id)
                                                    <div class="row">
                                                        <div class="col-md-1 mt-3">
                                                            @if(!$star->user->images)
                                                                <img src="source/images/avatar.jpeg"
                                                                     style="border-radius: 300px;display: block; margin-left: auto; margin-right: auto"
                                                                     class="img-circle" alt="" width="50" height="50">
                                                            @else
                                                                <img
                                                                    src="{{ asset('storage/rooms/'. $star->user->images) }}"
                                                                    style="border-radius: 300px;display: block; margin-left: auto; margin-right: auto"
                                                                    class="img-circle" alt="" width="50" height="50">
                                                            @endif
                                                        </div>
                                                        <div class="col-md-10 mt-3">
                                                            {{$star->user->name}}
                                                        </div>
                                                    </div>
                                                    @for($i=1;$i<=$star->number;$i++)
                                                        <div class="fa fa-star"
                                                             style="color: #ff9705"></div>
                                                    @endfor
                                                    <div><p>{{$star->content}}</p></div>
                                                    <hr>
                                                @endif
                                            @endforeach
                                            {{ $listStar->links() }}
                                            <div>
                                                <h5><span class="fa fa-bed"> Phòng ngủ :
                                {{$house->bedrooms}}
                        </span></h5>
                                            </div>
                                            <br>
                                            <div>
                                                <b class="fa fa-book"> THÔNG TIN PHÒNG ỐC :</b>
                                                <p>- Tổng diện tích : 150 m2</p>
                                                <p>- Không gian sống: 140 m2</p>
                                                <p>- {{$house->bedrooms}} phòng ngủ (3 phòng ngủ chính và 1 phòng ngủ
                                                    phụ)</p>
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
                                                Hoàn lại 50% giá trị đặt phòng khi khách hàng huỷ phòng trong vòng 48h
                                                sau khi đặt phòng thành
                                                công và trước 14 ngày so với thời gian check-in. Sau đó, hủy phòng trước
                                                14 ngày so với thời
                                                gian check-in, được hoàn lại 50% tổng số tiền đã trả (trừ phí dịch vụ).
                                                Chi tiết
                                            </div>
                                            <br>
                                            <div>
                                                <h4><b class="fa fa-exclamation"> Lưu ý đặc biệt</b></h4>
                                                <h5>PHỤ THU (nếu phát sinh đi thêm người):</h5>
                                                <b>- 1,000,000 VNĐ/đêm/ người lớn</b>
                                                <b>- 500,000 VNĐ/đêm/ trẻ em từ 2 tuổi -> 12 tuổi/ đêm</b>
                                                <b>- Sạch sẽ gọn gàng, ngăn nắp</b>
                                                <b>- Không mang vật nuôi</b>
                                                <b>- Không hút thuốc trong phòng</b>
                                            </div>
                                        </div>
                                        <hr>
                                        <!--Code mới-->
                                        <!--End-->
                                        <hr>
                                        <div class="col-md-12">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 mx-auto">
                                                        <div class="card card-signin my-5">
                                                            <div class="card-body">
                                                                <h3><b>Đánh Giá Sản Phẩm</b></h3>
                                                                <hr>
                                                                <div class="compolent_rating_content"
                                                                     style="display: flex;align-items:center">
                                                                    <div class="rating_item"
                                                                         style="width: 20%;margin: 0 20px">
                                                <span class="fa fa-star"
                                                      style="font-size: 60px;color: #ff9705;margin: 0 auto; text-align: center;">{{$starMedium}}</span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                                            @if(!$house->user->images)
                                                                <img src="source/images/avatar.jpeg"
                                                                     style="border-radius: 300px;display: block; margin-left: auto; margin-right: auto"
                                                                     class="img-circle" alt="" width="150" height="150">
                                                            @else
                                                                <img
                                                                    src="{{ asset('storage/rooms/'. $house->user->images) }}"
                                                                    style="border-radius: 300px;display: block; margin-left: auto; margin-right: auto"
                                                                    class="img-circle" alt="" width="150" height="150">
                                                            @endif
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
                                </div>
                            </div>
    {{--    </div>--}}
    {{--    </div>--}}

@endsection

