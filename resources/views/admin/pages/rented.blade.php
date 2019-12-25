@extends('admin.layout.master')

@section('contentAdmin')

    <div class="card mt-4" style="width: 100%">
        <div class="card-header"><h5>Nhà đã thuê</h5></div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Email chủ nhà</th>
                    <th scope="col">Địa chỉ thuê</th>
                    <th scope="col">Ngày thuê</th>
                    <th scope="col">Ngày trả</th>
                    <th scope="col">Tiền đã trả</th>
                    <th scope="col">Tình trạng</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $key=>$order)
                    <tr>
                        <th scope="row"> {{$key+1}} </th>
                        <td>{{\App\User::find($order->house->user_id)->email}}</td>
                        <td>{{$order->house->address}}</td>
                        <td>{{\Carbon\Carbon::create($order->check_in)->format('d/m/Y')}}</td>
                        <td>{{\Carbon\Carbon::create($order->check_out)->format('d/m/Y')}}</td>
                        <td>{{number_format($order->pay_money)}} đ</td>
                        <td>
                            @if(\Carbon\Carbon::create($order->check_in)->timestamp
                           >=\Carbon\Carbon::parse(\Carbon\Carbon::now('Asia/Ho_Chi_Minh'))->timestamp)
                                Chưa đến ngày
                                <a href="{{route('order.house.delete',$order->id)}}" class="btn btn-danger"
                                   onclick="return confirm('Không thể hủy nhà trước ngày thuê 1 ngày, bạn chắc chứ?')"
                                >Hủy</a>
                            @elseif((\Carbon\Carbon::create($order->check_in)->timestamp <=
                                       \Carbon\Carbon::parse(\Carbon\Carbon::now('Asia/Ho_Chi_Minh'))->timestamp))
                                @if((\Carbon\Carbon::create($order->check_out)->timestamp >=
                                       \Carbon\Carbon::parse(\Carbon\Carbon::now('Asia/Ho_Chi_Minh'))->timestamp))
                                    Đang trong thời gian thuê
                                    <a href="{{route('user.checkin.house',$order->id)}}"
                                       onclick="return confirm('check in')"
                                    >Check in</a>
                                @else
                                    Đã kết thúc
                                @endif
                            @endif
                        </td>
                    <tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection
