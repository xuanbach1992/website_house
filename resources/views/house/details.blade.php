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
                        <div class="ml-2 col-md-12"
                             style="text-align: left; font-size: 40px; font-weight: bold; float: left">{{number_format($house->price)}}
                            đ /đêm
                        </div>
                        <div class="ml-2 row">
                            <input type="text" class="mr-5 col-5 datepickerInput" placeholder="mm/dd/yyyy"
                                   name="checkin"
                                   style="border-radius: 10px">
                            @if($errors->has('checkin'))
                                <span class="text-danger">{{$errors->first('checkin')}}</span>
                            @endif
                            <input type="text" class="mr-l col-5 datepickerInput" placeholder="mm/dd/yyyy"
                                   name="checkout"
                                   style="border-radius: 10px">
                            @if($errors->has('checkout'))
                                <span class="text-danger">{{$errors->first('checkout')}}</span>
                            @endif
                        </div>
                        <div>
                            @foreach($orders as $order)
                                @if($order->house_id===$house->id&&$order->status==\App\StatusInterface::DATTHUETHANHCONG)
                                    <span class="text text-danger">** Đã được thuê {{\Carbon\Carbon::create($order->check_in)->format('d/m/Y')}}
                                        đến ngày {{\Carbon\Carbon::create($order->check_out)->format('d/m/Y')}}</span>
                                    <br>
                                @endif

                            @endforeach
                            <div class="col-md-12 mt-3">
                                <button type="submit" style="font-size:25px" class="btn btn-primary btn-sm">Đặt phòng
                                </button>
                            </div>
                        </div>
                        {{--                                        <input type="text" value="{{$house->user->email}}" name="email" readonly="readonly" style="display: none">--}}
                        {{--                                        <input type="text" value="{{$house->name}}" name="title" readonly="readonly" style="display: none">--}}
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
            @foreach($orders as $order)
                @guest()

                @else
                    @if( ($order->user_id===\Illuminate\Support\Facades\Auth::user()->id)&&
                            (\Carbon\Carbon::create($order->check_in)->timestamp
                           <=\Carbon\Carbon::parse(\Carbon\Carbon::now('Asia/Ho_Chi_Minh'))->timestamp)&&
                   (\Carbon\Carbon::create($order->check_out)->timestamp
                          >=\Carbon\Carbon::parse(\Carbon\Carbon::now('Asia/Ho_Chi_Minh'))->timestamp)
                          )
                        @if($order->status==\App\StatusInterface::DATTHUETHANHCONG&&
                $house->status =\App\StatusInterface::SANSANG)

                            <a class="col-lg-4 offset-2 btn-success pt-1"
                               href="{{route('user.checkin.house',$order->id)}}"
                               style="border-radius: 30px;padding-left:40px" onclick="return confirm('check in')"
                            >check in</a>
                        @elseif($order->status==\App\StatusInterface::NHANPHONG&&
                    $house->status =\App\StatusInterface::NHANPHONG)
                            <a class="col-lg-4 offset-2 btn-warning pt-1" style="border-radius: 30px;padding-left:40px"
                               href="{{route('user.checkout.house',$order->id)}}"
                               onclick="return confirm('Ban muon tra phong` phai ko?')"
                            >check out</a>
                        @endif
                    @endif
                @endguest
            @endforeach
        </div>
        <div class="row col-md-12">
            <div> @for($i=1;$i<=floor($starMedium);$i++)
                    <img src="{{asset('source/images/1.png')}}" width="35px" height="35px" alt="star5">
                @endfor
                @if(0.8<=$starMedium-floor($starMedium)&&$starMedium-floor($starMedium)<1)
                    <img src="{{asset('source/images/1.png')}}" width="35px" height="35px" alt="star5">
                @elseif(0.3<=$starMedium-floor($starMedium)&&$starMedium-floor($starMedium)<0.8)
                    <img src="{{asset('source/images/0.5.png')}}" width="35px" height="35px" alt="star5">
                @endif
            </div>


            <div>&nbsp&nbsp({{ $allStarInHouseDetail/$starMedium}}&nbsp;đánh giá)</div>
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
                        {{$house->district->name}} -
                        {{$house->cities->name}}
                </span></h5>
            </div>
            <div>
                <h5>
            <span class="far fa fa-home nav-icon"> Kiểu nhà :
                {{$house->houseCategory->name}}
                {{$house->roomCategory->name}}
                        - 50 m2 - Nguyên căn
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
        <!--Code bản đồ mới-->

        <div class="row">
            <div class="col-md-10 offset-1" >Địa chỉ trên bản đồ :
                <button id="showMap" class="btn btn-outline-primary">Click</button>
            </div>
            <div class="col-lg-8 houseMap" style="float: right;display: none">
                <div class="mapouter">
                    <div class="gmap_canvas">
                        <iframe width="600" height="500" id="gmap_canvas"
                                src="https://maps.google.com/maps?q={{$house->address.' - '.$house->district->name." - ".$house->cities->name}}=&z=13&ie=UTF8&iwloc=&output=embed"
                                frameborder="0"
                                scrolling="no" marginheight="0" marginwidth="0">
                            <a href="https://www.embedgooglemap.net"></a>
                        </iframe>
                    </div>
                </div>
            </div>
        </div>

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
                                    <div class="rating_item row" style="width: 40%;">

                                        <span class="fa fa-star col-md-12"
                                              style="font-size: 60px;color: #ff9705;">
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
                                @foreach($orders as $order)
                                    @guest()

                                    @else
                                        @if($order->user_id===\Illuminate\Support\Facades\Auth::user()->id &&
    $order->status===\App\StatusInterface::DAHOANTHANH)
                                            <hr>


                                            <form action="{{route('house.rating',$house->id)}}" method="post">
                                                @csrf
                                                <div style="display: flex; margin-top: 15px;font-size: 15px"
                                                     class="hide">
                                                    <div class="mt-2" style="margin-bottom: 0">Đánh Giá Của Bạn:</div>

                                                    <div style="margin:0;padding:0;" id="rating">
                                                        <input type="radio" id="star5" name="rating" value="5"/>
                                                        <label style="margin:0;padding:0;" class="full"
                                                               for="star5"></label>
                                                        <input type="radio" id="star4" name="rating" value="4"/>
                                                        <label style="margin:0;padding:0;" class="full"
                                                               for="star4"></label>
                                                        <input type="radio" id="star3" name="rating" value="3"/>
                                                        <label style="margin:0;padding:0;" class="full"
                                                               for="star3"></label>
                                                        <input type="radio" id="star2" name="rating" value="2"/>
                                                        <label style="margin:0;padding:0;" class="full"
                                                               for="star2"></label>
                                                        <input type="radio" id="star1" name="rating" value="1"/>
                                                        <label style="margin:0;padding:0;" class="full"
                                                               for="star1"></label>

                                                    </div>
                                                </div>
                                                <div>
                                                    <input class="form-control" name="contents">
                                                    <button type="submit"
                                                            class="btn mt-2 btn-primary js_rating_house">Gửi
                                                        đánh giá
                                                    </button>
                                                </div>
                                            </form>
                                            @break
                                        @endif
                                    @endguest
                                @endforeach
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
                                                    class="img-circle" alt="avatar_user"
                                                    width="50" height="50">
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
                                    </span>&nbsp&nbsp&nbsp&nbsp <?php $count = 0 ?>
                                            <span class="text_container">@foreach($listComment as $comment)
                                                    @if($comment->star_id===$star->id)
                                                        <?php $count += 1 ?>
                                                    @endif
                                                @endforeach
                                                @if($count!=0)
                                                    {{$count}} bình luận
                                                @endif
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
                                                                        alt="avatar_user"
                                                                        width="40" height="40">

                                                                </div>
                                                                <div class="col-md-9">
                                                                    <p>
                                                                        <b style="color: darkblue;font-size: 25px">{{$comment->user->name}}</b>
                                                                        &nbsp;&nbsp;&nbsp;{{$comment->body}}
                                                                    </p>
                                                                    <span
                                                                        style="font-size:15px">
                                                                {{$comment->created_at->diffForHumans(\Carbon\Carbon::now())}}
                                                            </span>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                        @endif
                                                    @endforeach
                                                    <form
                                                        action="{{route('house.comment',$star->id)}}"
                                                        method="post">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <img
                                                                    @guest()

                                                                    @else
                                                                    @if(\Illuminate\Support\Facades\Auth::user()->images==null)
                                                                    src="source/images/avatar.jpeg"
                                                                    @else
                                                                    src="{{ asset('storage/rooms/'. \Illuminate\Support\Facades\Auth::user()->images) }}"
                                                                    @endif
                                                                    @endguest
                                                                    style="border-radius: 300px;display: block; margin-left: auto; margin-right: auto"
                                                                    class="img-circle"
                                                                    width="31" height="31">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input class="form-control"
                                                                       type="text"
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
                                            {{$listStar->appends(request()->input())->links()}}
                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="text" id="house_id" value="{{$house->id}}" name="house_id" readonly="readonly"
               style="display: none">
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
           $('#showMap').click(function () {
               $('.houseMap').show();

           });
        });
        // let houseMap = {
        //     autoComplete: '',
        //     map: '',
        //     init: function () {
        //         let mapProp = {
        //             center: new google.maps.LatLng(21.1683767, 105.9003105),
        //             zoom: 10,
        //             mapTypeId: google.maps.MapTypeId.ROADMAP
        //         };
        //
        //         houseMap.map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
        //
        //         let input = document.getElementById('address');
        //
        //         houseMap.autocomplete = new google.maps.places.Autocomplete(input);
        //
        //         houseMap.autocomplete.addListener('place_changed', function () {
        //             var lat_auto = houseMap.autocomplete.getPlace().geometry.location.lat();
        //             var lng_auto = houseMap.autocomplete.getPlace().geometry.location.lng();
        //             houseMap.drawMarker(lat_auto, lng_auto);
        //         });
        //     },
        //     drawMarker: function (lat, lng) {
        //         let loc = {
        //             lat: parseFloat(lat),
        //             lng: parseFloat(lng)
        //         };
        //
        //         houseMap.map.setCenter(loc);
        //         let marker = new google.maps.Marker({
        //             position: loc,
        //             animation: google.maps.Animation.Bounce
        //         });
        //         marker.setMap(houseMap.map);
        //
        //     }
        // };

    </script>
    <script
        src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDRcNqM8iIP7Se2H3LMoc6dC6vkn1-FyZA&libraries=places"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



@stop
