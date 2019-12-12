@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="col-md-1 col-1"></div>


        <div class="col-md-10 row">

            <div class="col-md-6 ">
                <div id="demo" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="source/images/hero_1.jpg" alt="Los Angeles" width="600" height="600">
                        </div>
                        <div class="carousel-item">
                            <img src="source/images/img_2.jpg" alt="Chicago" width="600" height="600">
                        </div>
                        <div class="carousel-item">
                            <img src="source/images/hero_3.jpg" alt="New York" width="600" height="600">
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
            <div class="col-md-6 ">
                <div class="col-md-12 mt-5">
                    <h2 style="color: #ff513e ">Tên Nhà</h2>
                </div>
                <hr>
                <div class="row">

                    <div class="mt-3 col-md-4">
                        <p style="font-size: 20px">Giá</p>
                        <p style="font-size:14px">1000$</p>
                    </div>
                    <div class="mt-3 col-md-4">
                        <p style="font-size: 20px">Thành Phố</p>
                        <p style="font-size:14px">Thái Bình</p>
                    </div>
                    <div class="mt-3 col-md-4">
                        <p style="font-size: 20px">Số Điện Thoại</p>
                        <p style="font-size:14px">0981202560</p>
                    </div>
                </div>
                <hr>
                <div class="col-md-12">
                    <p style="font-size: 25px">Thông tin chi tiết</p>
                </div>
                <div class="col-md-12">
                    <p style="font-size: 14px">Lorem ipsum dolor sit Amet, consectetur adipiscing elit. Chúng tôi tố cáo
                        thời gian của khắc nghiệt của cuộc sống, rất dễ dàng để mang theo thông điệp deleniti cùng một lúc
                        mất người đàn ông khôn ngoan sẽ mở ra, tôi có! Mà họ bỏ rắc rối của chung tại một thời điểm khác và
                        trong thời gian khắc nghiệt, ông tránh xa những người mà họ noi theo.

                        Trừ khi lỗi của những thú vui mà anh cũng phải có, tuy nhiên, deleniti, nhưng anh muốn nỗi buồn của
                        tôi: vì ông sẽ tìm kiếm sự sụp đổ của sự vật, ai là nhục! Thời gian một kiến ​​trúc sư không được
                        lựa chọn với sự tâng bốc của cô tại mất một lần trong nỗi đau của cuộc sống, đau, ca ngợi họ: Bởi
                        đâu là người đàn ông này.</p>
                </div>
                <hr>
            </div>


        </div>


    </div>
@endsection
