@extends('admin.layout.master')

@section('contentAdmin')

    <div class="card mt-4" style="width: 100%">
        <div class="card-header"><h5>Thông báo</h5></div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Email liên hệ</th>
                    <th scope="col">Tên nhà</th>
                    <th scope="col">Ngày thuê</th>
                    <th scope="col">Ngày trả</th>
                    <th scope="col">Tổng tiền</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                @foreach(\App\Notification::all() as $key=> $notify)
                    <tbody>
                    @if(json_decode($notify->data)->receive==\Illuminate\Support\Facades\Auth::user()->email)
                        <tr>
                            <th scope="row">
                                {{ $key+1}}
                            </th>
                            <td>
                                {{ json_decode($notify->data)->sender}}
                            </td>
                            <td> {{ json_decode($notify->data)->house_title}}</td>
                            <td> {{ json_decode($notify->data)->checkin}}</td>
                            <td> {{ json_decode($notify->data)->checkout}}</td>
                            <td> {{ json_decode($notify->data)->total_price}}</td>
                            <td>
                                <a href="" class="btn btn-primary">Chấp nhận</a>&nbsp;&nbsp;
                                <a href="" class="btn btn-danger">Không đồng ý</a>
                            </td>
                            @endif
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>

@endsection
