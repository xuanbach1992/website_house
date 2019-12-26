@extends('admin.layout.master')

@section('contentAdmin')
    <div id="container" data-order="{{ $orderMonth }}"></div>
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
                    <th scope="col">Kiểu nhà</th>
                    <th scope="col">Giá/1 ngày</th>
                    <th scope="col" style="text-align: center">Chức năng</th>
                </tr>
                </thead>
                @foreach($houses as $key => $value)
                    <tbody>
                    <tr>
                        <th scope="row">{{++$key}}</th>
                        <td>{{$value->name}}</td>
                        <td>{{$value->cities->name}}</td>
                        <td>
                            <a href="{{route('house.show.rent.detail',$value->id)}}">Chi tiết</a>
                        </td>
                        <td>
                            @foreach($listHouseCategory as $houseCategory)
                                @if($value->house_category_id == $houseCategory->id)
                                    {{$houseCategory->name}}
                                @endif
                            @endforeach
                        </td>
                        <td>{{number_format($value->price)}} đ</td>
                        <td style="text-align: center">
                            <a href="{{route('house.showEdit',$value->id)}}" class="btn btn-primary">Sửa</a>&nbsp;&nbsp;
                            <a href="{{route('house.delete',$value->id)}}" class="btn btn-danger">Xóa</a>
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
            let order = $('#container').data('order');
            let listOfValue = [];
            let listOfDay = [];
            order.forEach(function (element) {
                listOfDay.push(element.getDays);
                listOfValue.push(+element.moneyInDays);
            });
            console.log(listOfValue);
            let chart = Highcharts.chart('container', {

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
                    data: listOfValue,
                    showInLegend: false
                }]
            });

            // $('#plain').click(function () {
            //     chart.update({
            //         chart: {
            //             inverted: false,
            //             polar: false
            //         },
            //         subtitle: {
            //             text: 'Plain'
            //         }
            //     });
            // });
            //
            // $('#inverted').click(function () {
            //     chart.update({
            //         chart: {
            //             inverted: true,
            //             polar: false
            //         },
            //         subtitle: {
            //             text: 'Inverted'
            //         }
            //     });
            // });
            //
            // $('#polar').click(function () {
            //     chart.update({
            //         chart: {
            //             inverted: false,
            //             polar: true
            //         },
            //         subtitle: {
            //             text: 'Polar'
            //         }
            //     });
            // });
        });
    </script>
@endsection
