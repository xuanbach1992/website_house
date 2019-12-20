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
                    <a class="btn btn-primary btn-sm"
                       href="{{route('house.book',$house->user_id)}}"
                    >Booking</a>

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
                                            <input name="" class="form-control" id="" >
                                            <button class="btn btn-primary" >Gửi đánh giá</button>
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
                    if (key +  1 <= number) {
                        $(this).addClass('rating_active')
                    }
                })
                $(".list_text").text('').text(listRatingText[number]).show();

            });
        });
    </script>
@stop
