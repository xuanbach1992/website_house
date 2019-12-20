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
            <div class="col-md-7">
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
                        Hoàn lại 50% giá trị đặt phòng khi khách hàng huỷ phòng trong vòng 48h sau khi đặt phòng thành
                        công và trước 14 ngày so với thời gian check-in. Sau đó, hủy phòng trước 14 ngày so với thời
                        gian check-in, được hoàn lại 50% tổng số tiền đã trả (trừ phí dịch vụ). Chi tiết
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
                                        <div class="compolent_rating_content" style="display: flex;align-items:center">
                                            <div class="rating_item" style="width: 20%;margin: 0 20px">
                                                <span class="fa fa-star"
                                                      style="font-size: 60px;color: #ff9705;margin: 0 auto; text-align: center;">4.4</span>
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
                                                            style="width: 30%;background-color: #f25800;display: block;height: 100%;border-radius: 5px"></b></span>
                                                        </div>
                                                        <div style="width: 10%;">
                                                            <a href="">10 </a>
                                                        </div>
                                                    </div>
                                                @endfor
                                            </div>

                                        </div>
                                        <hr>
                                        <?php
                                        $listRatingText = [
                                            1 => 'Không thích',
                                            2 => 'Tạm được',
                                            3 => 'Bình thường',
                                            4 => 'Rất tôt',
                                            5 => 'Tuyệt vời quá'
                                        ]
                                        ?>
                                        <div style="display: flex; margin-top: 15px;font-size: 15px" class="hide">
                                            <p style="margin-bottom: 0">Đánh Giá Của Bạn:</p>
                                            <span style="margin:0 15px" class="list_start">
                                                @for($i = 1 ;$i<=5 ; $i++)
                                                    <i class="fa fa-star" data-key="{{$i}}"></i>
                                                @endfor
                                            </span>
                                            <span class="list_text"></span>
                                        </div>
                                        <div>
                                            <input name="" class="form-control" id="">
                                            <button class="btn btn-primary">Gửi đánh giá</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Thông tin chủ nhà-->
            <div class="col-md-5">
                {{--                <div class="card" style="width: 23rem;">--}}
                {{--                    <div class="card-body">--}}
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 mx-auto">
                            <div class="card card-signin my-5">
                                <div class="card-body">
                                    <form action="{{route('house.book.notify',$house->id)}}" method="post">
                                        @csrf
                                        <div class="ml-5"
                                             style="text-align: left; font-size: 40px; font-weight: bold; float: left">{{$house->price}}
                                            $/đêm
                                        </div>
                                        <div class="ml-5">
                                            <input type="date" name="checkin" style="border-radius: 10px">
                                            @if($errors->has('checkin'))
                                                <p class="text-danger">{{$errors->first('checkin')}}</p>
                                            @endif
                                            <input type="date" name="checkout" style="border-radius: 10px">
                                            @if($errors->has('checkout'))
                                                <p class="text-danger">{{$errors->first('checkout')}}</p>
                                            @endif
                                        </div>
                                        {{--                                        <input type="text" value="{{$house->user->email}}" name="email" readonly="readonly" style="display: none">--}}
                                        {{--                                        <input type="text" value="{{$house->name}}" name="title" readonly="readonly" style="display: none">--}}
                                        {{--                                        <input type="text" value="{{$house->id}}" name="house_id" readonly="readonly" style="display: none">--}}

                                        <h3><b>Thông Tin Liên Hệ</b></h3>
                                        <hr>
                                        <p><b>Name :</b> {{$house->user->name}}</p>
                                        <p><b>Phone :</b> {{$house->user->phone}}</p>
                                        <p><b>Email :</b> {{$house->user->email}}</p>
                                        <div class="col-md-12 row">
                                            <button type="submit" class="btn btn-primary btn-sm">Đặt phòng
                                            </button>
                                        </div>
                                    </form>
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
@section('script')
    <script>
        $(function () {
            let listStart = $(".list_start .fa");
            listRatingText = {
                1: 'Không thích',
                2: 'Tạm được',
                3: 'Bình thường',
                4: 'Rất tôt',
                5: 'Tuyệt vời quá'
            }
            listStart.mouseover(function () {
                let $this = $(this);
                let number = $this.attr('data-key');
                listStart.removeClass('rating_active');

                $.each(listStart, function (key, value) {
                    if (key + 1 <= number) {
                        $(this).addClass('rating_active')
                    }
                })
                $(".list_text").text('').text(listRatingText[number]).show();

            });
        });
    </script>
@stop
