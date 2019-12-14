@extends('welcome')

@section('content')

    <form action="{!! route('search') !!}" method="get">
        <div class="realestate-filter">
            <div class="container">
                <div class="realestate-filter-wrap nav">
                    <a href="#for-rent" class="active" data-toggle="tab" id="rent-tab" aria-controls="rent"
                       aria-selected="true">Chưa cho thuê</a>
                    <a href="#for-sale" class="" data-toggle="tab" id="sale-tab" aria-controls="sale"
                       aria-selected="false">Đã cho thuê</a>
                </div>
            </div>
        </div>

        <div class="realestate-tabpane pb-5 " id="demo">
            <div class="container tab-content">
                <!--for-rent-->
                <div class="tab-pane active" id="for-rent" role="tabpanel" aria-labelledby="rent-tab">
                    <!--dòng 1-->
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <input type="text" name="keyBedrooms" class="form-control" placeholder="Phòng ngủ">
                        </div>
                        <div class="col-md-4 form-group">
                            <select name="cities" class="form-control w-100" onchange="onChange(this.value);">
                                <option value="-1">Thành Phố</option>
                                @foreach($listCities as $city)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <select name="district" id="district_id" class="form-control w-100">
                                <option value="-1">Quận huyện</option>
                            </select>
                        </div>
                    </div>
                    <!--dòng 2-->
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <input type="text" name="keyBathroom" class="form-control" placeholder="Phòng tắm">
                        </div>
                        <div class="col-md-4 form-group">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="number" name="price_from" class="form-control" placeholder="Giá từ">
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="number" name="price_to" class="form-control" placeholder="Đến giá">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 form-group">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="date" name="" class="form-control">
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="date" name="" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--nút submit-->
                    <div class="row">
                        <div class="col-md-4">
                            <input type="submit" class="btn btn-black py-3 btn-block" value="Submit">
                        </div>
                    </div>
                </div>

                <!--for-sale-->
                <div class="tab-pane" id="for-sale" role="tabpanel" aria-labelledby="sale-tab">
                    <!--dòng 1-->
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <select name="" id="" class="form-control w-100">
                                <option value="">Any Bedrooms - phòng ngủ</option>
                                <option value="">0</option>
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3+</option>
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <input type="text" class="form-control" placeholder="Địa chỉ">
                        </div>
                        <div class="col-md-4 form-group">
                            <select name="" id="" class="form-control w-100">
                                <option value="">Thành phố</option>
                                <option value="">0</option>
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                            </select>
                        </div>
                    </div>
                    <!--dòng 2-->
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <select name="" id="" class="form-control w-100">
                                <option value="">Any Bathrooms - phòng tắm</option>
                                <option value="">0</option>
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3+</option>
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <select name="" id="" class="form-control w-100">
                                        <option value="">Giá từ:</option>
                                        <option value="">$100</option>
                                        <option value="">$200</option>
                                        <option value="">$300</option>
                                        <option value="">$400</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select name="" id="" class="form-control w-100">
                                        <option value="">Đến Giá:</option>
                                        <option value="">$25,000</option>
                                        <option value="">$50,000</option>
                                        <option value="">$75,000</option>
                                        <option value="">$100,000</option>
                                        <option value="">$100,000,000</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 form-group">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <select name="" id="" class="form-control w-100">
                                        <option value="">Từ ngày:</option>
                                        <option value="">$100</option>
                                        <option value="">$200</option>
                                        <option value="">$300</option>
                                        <option value="">$400</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select name="" id="" class="form-control w-100">
                                        <option value="">Đến Ngày:</option>
                                        <option value="">$25,000</option>
                                        <option value="">$50,000</option>
                                        <option value="">$75,000</option>
                                        <option value="">$100,000</option>
                                        <option value="">$100,000,000</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--nút submit-->
                    <div class="row">
                        <div class="col-md-4">
                            <input type="submit" class="btn btn-black py-3 btn-block" value="Submit">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="site-section bg-black">
        <div class="container">
            <div class="row">
                @foreach($houses as $key => $value)
                    <div class="col-md-4 mb-5">
                        <div class="media-38289">
                            <a href="{{route('house.detail',$value->id)}}" class="d-block"><img
                                        src="{{asset("/storage/$value->image")}}" alt="Image" class="img-fluid"></a>
                            <div class="text">
                                <div class="d-flex justify-content-between mb-3">
                                    <div class="sq d-flex align-items-center"><span
                                                class="wrap-icon icon-fullscreen"></span> <a
                                                href="{{route('house.detail',$value->id)}}"
                                                style="color: white">{{$value->name}}</a></div>
                                    <div class="bed d-flex align-items-center"><span
                                                class="wrap-icon icon-bed"></span> <span>{{$value->bedrooms}}</span>
                                    </div>
                                    <div class="bath d-flex align-items-center"><span
                                                class="wrap-icon icon-bath"></span> <span>{{$value->bathroom}}</span>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-primary btn-sm">Booking</button>
                                    <button class="btn btn-warning btn-sm">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-12 mt-5 text-center pagination-39291">
                    <span class="active">1</span>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">4</a>
                </div>
            </div>
        </div>
    </div>


    <div class="site-section bg-primary">
        <div class="container block-13">
            <div class="nonloop-block-13 owl-carousel">
                <div class="testimonial-38920 d-flex align-items-start">
                    <div class="pic mr-4"><img src="source/images/person_1.jpg" alt=""></div>
                    <div>
                        <span class="meta">Business Man</span>
                        <h3 class="mb-4">Josh Long</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo sapiente unde
                            pariatur id, hic
                            quos nihil nulla veritatis!</p>
                        <div class="mt-4">
                            <span class="icon-star text-white"></span>
                            <span class="icon-star text-white"></span>
                            <span class="icon-star text-white"></span>
                            <span class="icon-star text-white"></span>
                        </div>
                    </div>
                </div>

                <div class="testimonial-38920 d-flex align-items-start">
                    <div class="pic mr-4"><img src="source/images/person_1.jpg" alt=""></div>
                    <div>
                        <span class="meta">Business Woman</span>
                        <h3 class="mb-4">Jean Doe</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo sapiente unde
                            pariatur id, hic
                            quos nihil nulla veritatis!</p>
                        <div class="mt-4">
                            <span class="icon-star text-white"></span>
                            <span class="icon-star text-white"></span>
                            <span class="icon-star text-white"></span>
                            <span class="icon-star text-white"></span>
                        </div>
                    </div>
                </div>

                <div class="testimonial-38920 d-flex align-items-start">
                    <div class="pic mr-4"><img src="source/images/person_1.jpg" alt=""></div>
                    <div>
                        <span class="meta">Business Woman</span>
                        <h3 class="mb-4">Jean Doe</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo sapiente unde
                            pariatur id, hic
                            quos nihil nulla veritatis!</p>
                        <div class="mt-4">
                            <span class="icon-star text-white"></span>
                            <span class="icon-star text-white"></span>
                            <span class="icon-star text-white"></span>
                            <span class="icon-star text-white"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
