@extends('layouts.app')

@section('content')

<form action="">
    <div class="realestate-filter">
        <div class="container">
            <div class="realestate-filter-wrap nav">
                <a href="#for-rent" class="active" data-toggle="tab" id="rent-tab" aria-controls="rent" aria-selected="true">For Rent</a>
                <a href="#for-sale" class="" data-toggle="tab" id="sale-tab" aria-controls="sale" aria-selected="false">For Sale</a>
            </div>
        </div>
    </div>

    <div class="realestate-tabpane pb-5 " id="demo">
        <div class="container tab-content">
            <div class="tab-pane active" id="for-rent" role="tabpanel" aria-labelledby="rent-tab">

                <div class="row">
                    <div class="col-md-4 form-group">
                        <select name="" id="" class="form-control w-100">
                            <option value="">All Types</option>
                            <option value="">Townhouses</option>
                            <option value="">Duplexes</option>
                            <option value="">Quadplexes</option>
                            <option value="">Condominiums</option>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <input type="text" class="form-control" placeholder="Title">
                    </div>
                    <div class="col-md-4 form-group">
                        <input type="text" class="form-control" placeholder="Address">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 form-group">
                        <select name="" id="" class="form-control w-100">
                            <option value="">Any Bedrooms</option>
                            <option value="">0</option>
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3+</option>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <select name="" id="" class="form-control w-100">
                            <option value="">Any Bathrooms</option>
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
                                    <option value="">Min Price</option>
                                    <option value="">$100</option>
                                    <option value="">$200</option>
                                    <option value="">$300</option>
                                    <option value="">$400</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select name="" id="" class="form-control w-100">
                                    <option value="">Max Price</option>
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
                <div class="row">
                    <div class="col-md-4">
                        <input type="submit" class="btn btn-black py-3 btn-block" value="Submit">
                    </div>
                </div>

            </div>
            <div class="tab-pane" id="for-sale" role="tabpanel" aria-labelledby="sale-tab">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <select name="" id="" class="form-control w-100">
                            <option value="">All Types</option>
                            <option value="">Townhouses</option>
                            <option value="">Duplexes</option>
                            <option value="">Quadplexes</option>
                            <option value="">Condominiums</option>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <input type="text" class="form-control" placeholder="Title">
                    </div>
                    <div class="col-md-4 form-group">
                        <input type="text" class="form-control" placeholder="Address">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 form-group">
                        <select name="" id="" class="form-control w-100">
                            <option value="">Any Bedrooms</option>
                            <option value="">0</option>
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3+</option>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <select name="" id="" class="form-control w-100">
                            <option value="">Any Bathrooms</option>
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
                                    <option value="">Min Price</option>
                                    <option value="">$100</option>
                                    <option value="">$200</option>
                                    <option value="">$300</option>
                                    <option value="">$400</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select name="" id="" class="form-control w-100">
                                    <option value="">Max Price</option>
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
                    <a href="#" class="d-block"><img src="{{asset("/storage/$value->image")}}" alt="Image" class="img-fluid"></a>
                    <div class="text">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="sq d-flex align-items-center"><span class="wrap-icon icon-fullscreen"></span> <span>{{$value->name}}</span></div>
                            <div class="bed d-flex align-items-center"><span class="wrap-icon icon-bed"></span> <span>{{$value->bedrooms}}</span></div>
                            <div class="bath d-flex align-items-center"><span class="wrap-icon icon-bath"></span> <span>{{$value->bathroom}}</span></div>
                        </div>
                        <h3 class="mb-3"><a href="#">{{$value->price}} VND</a></h3>
                        <span class="d-block small address d-flex align-items-center"> <span class="icon-room mr-3 text-primary"></span> <span>{{$value->address}}</span></span>
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
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo sapiente unde pariatur id, hic quos nihil nulla veritatis!</p>
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
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo sapiente unde pariatur id, hic quos nihil nulla veritatis!</p>
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
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo sapiente unde pariatur id, hic quos nihil nulla veritatis!</p>
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
