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
                        <td>{{$order->check_in}}</td>
                        <td>{{$order->check_out}}</td>
                        <td>{{number_format($order->pay_money)}} đ</td>
                        <td>
                            @if($order->status==1)
                                Đã thuê xong
                            @elseif($order->status==0)
                                Đang sẵn sàng
                                <a href="{{route('order.house.delete',$order->id)}}" class="btn btn-danger"
                                onclick="return confirm('Bạn muốn hủy thuê nhà không')"
                                >Hủy</a>
                            @endif
                        </td>
                    <tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection
