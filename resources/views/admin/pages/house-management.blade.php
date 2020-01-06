@extends('admin.layout.master')

@section('contentAdmin')
    <div class="container row"></div>
    <div class="col-md-5" id="containerDay" data-order="{{ $orderDay }}"></div>
    <div class="col-md-5 offset-1" id="containerMonth" data-order="{{ $orderMonth }}"></div>
    <div class="card mt-4" style="width: 100%">
        <div class="card-header"><h5>Danh sách nhà cho thuê</h5></div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên Nhà</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Lịch đặt thuê</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Kiểu nhà</th>
                    <th scope="col">Giá/1 ngày</th>
                    <th scope="col" style="text-align: center">Chức năng</th>
                </tr>
                </thead>
                @foreach($houses as $key => $house)
                    <tbody>
                    <tr>
                        <th scope="row">{{++$key}}</th>
                        <td>{{$house->name}}</td>
                        <td>{{$house->cities->name}}</td>
                        <td>
                            <a href="{{route('house.show.rent.detail',$house->id)}}">Chi tiết</a>
                        </td>
                        <td>
                            <select name="status" class="custom-select mr-sm-2 status_house" data-id="{{$house->id}}">
                                <option value="{{\App\StatusInterface::NHANPHONG}}"
                                        @if(\App\StatusInterface::NHANPHONG == $house->status)
                                        selected
                                    @endif
                                >Khách đã tới</option>
                                <option value="{{\App\StatusInterface::TRAPHONG}}"
                                        @if(\App\StatusInterface::TRAPHONG == $house->status)
                                        selected
                                    @endif
                                >Khách đã trả phòng</option>
                                <option value="{{\App\StatusInterface::SANSANG}}"
                                        @if(\App\StatusInterface::SANSANG == $house->status)
                                        selected
                                    @endif
                                >Sẵn sàng cho thuê</option>
                            </select>
                        </td>
                        <td>
                            @foreach($listHouseCategory as $houseCategory)
                                @if($house->house_category_id == $houseCategory->id)
                                    {{$houseCategory->name}}
                                @endif
                            @endforeach
                        </td>
                        <td>{{number_format($house->price)}} đ</td>
                        <td style="text-align: center">
                            <a href="{{route('house.showEdit',$house->id)}}" class="btn btn-primary">Sửa</a>&nbsp;&nbsp;
                            <a href="{{route('house.delete',$house->id)}}" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
    <!--code script vẽ biểu đồ-->
    <script>
        $(document).ready(function () {
            let orderDay = $('#containerDay').data('order');
            let orderMonth = $('#containerMonth').data('order');
            let listOfValueDay = [];
            let listOfDay = [];
            let listOfValueMonth = [];
            let listOfMonth = [];
            orderDay.forEach(function (element) {
                listOfDay.push(element.getDays);
                listOfValueDay.push(+element.moneyInDays);
            });
            let chartByDay = Highcharts.chart('containerDay', {
                title: {
                    text: 'Money in days'
                },

                xAxis: {
                    title: {
                        text: 'Days'
                    },
                    categories: listOfDay,
                },
                yAxis: {
                    title: {
                        text: 'VND'
                    }
                },
                plotOptions: {
                    column: {
                        borderRadius: 5
                    }
                },

                series: [{
                    type: 'column',
                    styledMode: true,
                    colorByPoint: true,
                    data: listOfValueDay,
                    showInLegend: false
                }]
            });
            orderMonth.forEach(function (element) {
                listOfMonth.push(element.getMonth);
                listOfValueMonth.push(+element.moneyInMonth);
            });
            let chartByMonth = Highcharts.chart('containerMonth', {

                title: {
                    text: 'Money in months'
                },

                xAxis: {
                    title: {
                        text: 'months'
                    },
                    categories: listOfMonth,
                },
                yAxis: {
                    title: {
                        text: 'VND'
                    }
                },
                plotOptions: {
                    column: {
                        borderRadius: 5
                    }
                },

                series: [{
                    type: 'column',
                    styledMode: true,
                    colorByPoint: true,
                    data: listOfValueMonth,
                    showInLegend: false
                }]
            });

        });
    </script>
@endsection
