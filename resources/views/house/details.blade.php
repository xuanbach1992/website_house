@extends('layouts.app')

@section('content')
    <div class="col-md-7">
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
    <div class="col-md-5 mt-0 informationHouseHost" style="font-size: 15px">
        <div class="col-md-12 col-lg-12">
            <div class="card card-signin">
                <div class="card-body">
                    <form action="{{route('house.book.notify',$house->id)}}" method="post">
                        @csrf
                        <div class="ml-2"
                             style="text-align: left; font-size: 40px; font-weight: bold; float: left">{{number_format($house->price)}}
                            đ /đêm
                        </div>
                        <div class="ml-2">
                            <input type="date" class="mr-2" name="checkin" style="border-radius: 10px">
                            @if($errors->has('checkin'))
                                <span class="text-danger">{{$errors->first('checkin')}}</span>
                            @endif
                            <input type="date" class="ml-2" name="checkout" style="border-radius: 10px">
                            @if($errors->has('checkout'))
                                <span class="text-danger">{{$errors->first('checkout')}}</span>
                            @endif
                        </div>
                        <div>
                            @foreach($orders as $order)
                                @if($order->house_id===$house->id&&$order->status==\App\StatusHouseInterface::THANHCONG)
                                    <span class="text text-danger">** Đã được thuê {{\Carbon\Carbon::create($order->check_in)->format('d/m/Y')}}
                                        đến ngày {{\Carbon\Carbon::create($order->check_out)->format('d/m/Y')}}</span>
                                @endif

                            @endforeach
                            <div class="col-md-12 mt-2">
                                <button type="submit" style="font-size:25px" class="btn btn-primary btn-sm">Đặt phòng
                                </button>
                            </div>
                        </div>
                        {{--                                        <input type="text" value="{{$house->user->email}}" name="email" readonly="readonly" style="display: none">--}}
                        {{--                                        <input type="text" value="{{$house->name}}" name="title" readonly="readonly" style="display: none">--}}
                        {{--                                        <input type="text" value="{{$house->id}}" name="house_id" readonly="readonly" style="display: none">--}}
                        <hr>
                        <div class="row">
                            <div class="col-lg-6"><img
                                    @if(!$house->user->images)
                                    src="source/images/avatar.jpeg"
                                    @else
                                    src="{{ asset('storage/rooms/'. $house->user->images) }}"
                                    @endif
                                    style="border-radius: 300px;display: block; margin-left: 0"
                                    class="img-circle" alt="" width="100" height="100"></div>
                            <div class="col-lg-6"><p> {{$house->user->name}}</p>
                                <p><b>ĐT :</b> {{$house->user->phone}}</p>
                                <p><b>Email :</b> {{$house->user->email}}</p></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-7">
        <div class="col-md-9 mt-5 row">
            <h4><b style="color: #0037ff ">{{$house->name}}</b></h4>
            {{--            <b class="offset-1">Trạng thái :</b>--}}
            {{--            @if(\App\StatusHouseInterface::CHUACHOTHUE == $house->status)--}}
            {{--                <option>Chưa cho thuê</option>--}}
            {{--            @elseif(\App\StatusHouseInterface::DACHOTHUE == $house->status)--}}
            {{--                <option>Đã cho thuê</option>--}}
            {{--            @else--}}
            {{--                <option>Chờ xác nhận</option>--}}
            {{--            @endif--}}

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
                <h5>
                    <span class="far fa fa-home nav-icon"> Kiểu nhà :
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
                <p>- Tổng diện tích : 150 m2</p>
                <p>- Không gian sống: 140 m2</p>
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
                                                      style="font-size: 60px;color: #ff9705;margin: 0 auto; text-align: center;">
                                                    {{round($starMedium,2)}}
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
                                        <div class="row">
                                            <div class="col-md-1 mt-3">
                                                <img
                                                    @if(!$star->user->images)
                                                    src="source/images/avatar.jpeg"
                                                    @else
                                                    src="{{ asset('storage/rooms/'. $star->user->images) }}"
                                                    @endif
                                                    style="border-radius: 300px;display: block; margin-left: auto; margin-right: auto"
                                                    class="img-circle" alt="avatar_user" width="50" height="50">
                                            </div>
                                            <div class="col-md-10 mt-3 ml-3">
                                                {{$star->user->name}}
                                            </div>
                                        </div>
                                        @for($i=1;$i<=$star->number;$i++)
                                            <div class="fa fa-star"
                                                 style="color: #ff9705"></div>
                                        @endfor
                                        <div>
                                            <p>{{$star->content}}</p>
                                            <span style="font-size:15px">
                                                {{$star->created_at->diffForHumans(\Carbon\Carbon::now('Asia/Ho_Chi_Minh'))}}
                                            </span>


                                            <div class="text_container">
                                                <h3 style="background-color: #3490dc;color:
                                            white;border-radius: 25px; margin:2px 2px;padding:4px 6px;height: 25px;
                                             border: none;text-align: center;text-decoration: none;display: inline-block;
                                             font-size: 16px;cursor: pointer;"
                                                >Reply
                                                </h3>
                                                <div class="col-md-12 ml-5">
                                                    @foreach($listComment as $comment)
                                                        @if($comment->star_id===$star->id)
                                                            <div class="row">
                                                                <div class="col-md-1">
                                                                    <img
                                                                        @if(!$comment->user->images)
                                                                        src="source/images/avatar.jpeg"
                                                                        @else
                                                                        src="{{ asset('storage/rooms/'. $comment->user->images) }}"
                                                                        @endif
                                                                        style="border-radius: 300px;display: block; margin-left: auto; margin-right: auto"
                                                                        alt="avatar_user" width="40" height="40">

                                                                </div>
                                                                <div class="col-md-9">
                                                                    <p>
                                                                        <b style="color: darkblue;font-size: 25px">{{$comment->user->name}}</b>
                                                                        &nbsp;&nbsp;&nbsp;{{$comment->body}}
                                                                    </p>
                                                                    <span style="font-size:15px">
                                                                        {{$comment->created_at->diffForHumans(\Carbon\Carbon::now('Asia/Ho_Chi_Minh'))}}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                        @endif
                                                    @endforeach
                                                    <form action="{{route('house.comment',$star->id)}}"
                                                          method="post">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <img
                                                                    @if(!$house->user->images)
                                                                    src="source/images/avatar.jpeg"
                                                                    @else
                                                                    src="{{ asset('storage/rooms/'. $house->user->images) }}"
                                                                    @endif
                                                                    style="border-radius: 300px;display: block; margin-left: auto; margin-right: auto"
                                                                    class="img-circle" width="31" height="31">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input class="form-control" type="text"
                                                                       style="border-radius: 30px;height: 30px"
                                                                       name="body">
                                                                <button style="display: none"
                                                                        type="submit">
                                                                    <img
                                                                        src="https://img.icons8.com/small/20/000000/filled-sent.png">
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <hr>

                                            @endforeach
                                            {{ $listStar->links() }}
                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Thông tin chủ nhà-->

@endsection
@section('script')
    <script>


        $(document).ready(function () {
            $('.text_container').addClass("hidden");

            $('.text_container').click(function () {
                var $this = $(this);
                if ($this.hasClass("hidden")) {
                    $(this).removeClass("hidden").addClass("visible");

                }
            });
        });
    </script>
@stop
