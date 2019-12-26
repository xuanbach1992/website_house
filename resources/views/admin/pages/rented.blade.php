@extends('admin.layout.master')

@section('contentAdmin')

    <div class="card mt-4" style="width: 100%">
        <div class="card-header"><h5>Lịch sử đi thuê nhà </h5></div>
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
                        @if(\Carbon\Carbon::create($order->check_in)->timestamp
                        >=\Carbon\Carbon::parse(\Carbon\Carbon::now('Asia/Ho_Chi_Minh'))->timestamp)
                            <td>Chưa đến ngày</td>
                            <td><a href="{{route('order.house.delete',$order->id)}}" class="btn btn-danger"
                                   onclick="return confirm('Không thể hủy nhà trước ngày thuê 1 ngày, bạn chắc chứ?')"
                                >Hủy</a></td>
                        @else
                            @if((\Carbon\Carbon::create($order->check_out)->timestamp >=
                                   \Carbon\Carbon::parse(\Carbon\Carbon::now('Asia/Ho_Chi_Minh'))->timestamp)
                                   &&$order->status===\App\StatusInterface::DATTHUETHANHCONG
                                &&  $order->house->status ===\App\StatusInterface::SANSANG)
                                <td> Đã đến ngày, nhưng bạn chưa tới</td>
                                <td><a class="btn-success btn" href="{{route('user.checkin.house',$order->id)}}"
                                       onclick="return confirm('Check in tại nhà đã thuê ^^')"
                                    >Check in</a></td>

                            @elseif((\Carbon\Carbon::create($order->check_out)->timestamp >=
                                   \Carbon\Carbon::parse(\Carbon\Carbon::now('Asia/Ho_Chi_Minh'))->timestamp)
                                   &&$order->status===\App\StatusInterface::NHANPHONG
                                &&  $order->house->status ===\App\StatusInterface::NHANPHONG)
                                <td>Đã đến thuê</td>
                                <td><a class="btn btn-warning"
                                       href="{{route('user.checkout.house',$order->id)}}"
                                       onclick="return confirm('Bạn muốn trả phòng phải không?')"
                                    >check out</a>
                                </td>
                            @elseif(\Carbon\Carbon::create($order->check_out)->timestamp <=
                                           \Carbon\Carbon::parse(\Carbon\Carbon::now('Asia/Ho_Chi_Minh'))->timestamp&&
                                           $order->status===\App\StatusInterface::DAHOANTHANH)
                                <td>Đã kết thúc</td>
                            @else
                                <td>Khách đã trả phòng</td>

                    @endif
                    @endif
                    <tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection
