@extends('admin.layout.master')

@section('contentAdmin')

    <div class="card mt-4" style="width: 100%">
        <div class="card-header"><h5>Lịch thuê của ngôi nhà {{$house_name}} sắp tới </h5></div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Emai người thuê</th>
                    <th scope="col">Ngày thuê</th>
                    <th scope="col">Ngày trả phòng</th>
                    <th scope="col">Tổng tiền</th>
                    <th>Ghi chú</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $key=>$order)
                    @if($order->status===\App\StatusInterface::DATTHUETHANHCONG)
                        <tr>
                            <th scope="row"> {{$key+1}} </th>
                            <td>{{\App\User::find($order->user_id)->email}}</td>
                            <td>{{\Carbon\Carbon::create($order->check_in)->format('d/m/Y')}}</td>
                            <td>{{\Carbon\Carbon::create($order->check_out)->format('d/m/Y')}}</td>
                            <td>{{number_format($order->pay_money)}}đ</td>
                            <td></td>
                        <tr>
                @endif
                @endforeach
            </table>
        </div>

    </div>
    <div><a href="{{route('admin.house')}}" class="btn btn-secondary">Back</a></div>


@endsection
