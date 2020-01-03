@extends('welcome')

@section('content')
    <div style="border: 1px solid rgba(69,46,255,0.25)">
        <form action="{!! route('search') !!}" method="get">
            <div class="realestate-filter">
                <div class="container">
                    <div class="realestate-filter-wrap nav">
                        {{--                    <a href="#for-rent" class="active" data-toggle="tab" id="rent-tab" aria-controls="rent"--}}
                        {{--                       aria-selected="true">Tìm kiếm</a>--}}
                        {{--                    <a href="#for-sale" class="" data-toggle="tab" id="sale-tab" aria-controls="sale"--}}
                        {{--                       aria-selected="false">Đã cho thuê</a>--}}
                    </div>
                </div>
            </div>

            <div class="realestate-tabpane pb-5 " style="background-color: #d4d2d2" id="demo">
                <div class="container tab-content">
                    <!--for-rent-->
                    <div class="tab-pane active" id="for-rent" role="tabpanel" aria-labelledby="rent-tab">
                        <!--dòng 1-->
                        <div class="row">
                            <div class="col-md-4 mt-4 form-group">
                                <input type="text" name="keyBedrooms"
                                       value="{{ (isset($filter)) ? $filter["keyBedrooms"] : null }}"
                                       class="form-control"
                                       placeholder="Phòng ngủ">
                            </div>
                            <div class="col-md-4 mt-4 form-group">
                                <select name="cities" onchange="onChange(this.value);" class="form-control w-100">
                                    <option value="-1">Thành Phố</option>
                                    {{--                                @if(!isset($filter))--}}
                                    @foreach($listCities as $city)
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                    {{--                                @else--}}
                                    {{--                                    <option>{{$filter["keyBedrooms"]}}</option>--}}
                                    {{--                                @endif--}}
                                </select>
                            </div>
                            <div class="col-md-4 mt-4 form-group">
                                <select name="district" id="district_id" class="form-control w-100">
                                    <option value="-1">Quận huyện</option>
                                </select>
                            </div>
                        </div>
                        <!--dòng 2-->
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <input type="text" name="keyBathroom"
                                       value="{{ (isset($filter)) ? $filter["keyBathroom"] : null }}"
                                       class="form-control"
                                       placeholder="Phòng tắm">
                            </div>
                            <div class="col-md-4 form-group">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <input type="number" name="price_from"
                                               value="{{ (isset($filter)) ? $filter["price_from"] : null }}"
                                               class="form-control" placeholder="Giá từ">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input type="number" name="price_to"
                                               value="{{ (isset($filter)) ? $filter["price_to"] : null }}"
                                               class="form-control" placeholder="Đến giá">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 form-group">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <input type="text" name="check_in" class="form-control searchDate ">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input type="text" name="check_out" class="form-control searchDate">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--nút submit-->
                        <div class="row">
                            <div class="col-md-4">
                                <button type="submit" class="btn  py-3 btn-block"
                                        style="background-color: rgba(14,35,255,0.66);border-radius:15px;color: white">
                                    Search...
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>

        <div class="site-section "
             style="background-color:#f6efefa6;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px">
            <div class="container">
                <div class="row">
                    @foreach($houses as $key => $house)

                        <div class="col-md-4 mb-5">
                            <div class="media-38289">
                                <a href="{{route('house.detail',$house->id)}}" class="d-block">
                                    <img
                                        src="{{asset('storage/'.$house->images[0]->path)}}" alt="Image"
                                        class="img-fluid" style="width: 400px;height: 250px"></a>
                                <div class="text">
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="sq d-flex align-items-center">
                                            <a
                                                href="{{route('house.detail',$house->id)}}"
                                                style="color: white;font-size:30px">{{$house->name}}</a></div>
                                    </div>
                                    <div class="fa fa-money" style="font-size:40px"><span class="col-md-6 mt-1">{{number_format($house->price)}} đ</span>
                                    </div>
                                    <div class="bed d-flex align-items-center">
                                        <span class="fa fa-bed" style="font-size:40px"></span>
                                        <span style="font-size:40px">&nbsp&nbsp{{$house->bedrooms}}</span>
                                    </div>
                                    <div class="bath d-flex align-items-center"><span class="fa fa-bath"
                                                                                      style="font-size:40px"></span>
                                        <span style="font-size:40px">&nbsp&nbsp{{$house->bathroom}}</span>
                                    </div>

                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $(document).ready(function () {
            $(".searchDate").datepicker({
                minDate: '+1D',
                dateFormat: 'dd-mm-yy'
            });
        });
    </script>
@stop
