@extends('admin.layout.master')

@section('contentAdmin')
    <style>
        input[type=checkbox] {
            /* Double-sized Checkboxes */
            -ms-transform: scale(2); /* IE */
            -moz-transform: scale(2); /* FF */
            -webkit-transform: scale(2); /* Safari and Chrome */
            -o-transform: scale(2); /* Opera */
            padding: 10px;
        }
    </style>
    <div class="modal fade" id="showReasonDelete" data-backdrop="static"
         tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        Lý do hủy</h5>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" enctype="multipart/form-data"
                      action="{{route('order.house.delete')}}">
                    @csrf
                    <input  name="idHouseBooking" readonly="readonly" type="text" class="idHouseBooking">
                    <div class="modal-body">
                        <div>
                            <div style="font-size: 1.25rem" class="pl-3">
                                <input type="checkbox"
                                       name="reasonOne" value="Lý do cá nhân">
                                &nbsp; Lý do cá nhân
                            </div>
                        </div>
                        <div>
                            <div style="font-size: 1.25rem" class="pl-3">
                                <input type="checkbox"
                                       name="reasonTwo"
                                       value="Đổi ngày hoặc điểm đến">
                                &nbsp; Đổi ngày hoặc điểm đến
                            </div>
                        </div>
                        <div>
                            <div style="font-size: 1.25rem" class="pl-3">
                                <input type="checkbox"
                                       name="reasonThree"
                                       value="Số lượng hoặc nhu cầu thay đổi">
                                &nbsp; Số lượng hoặc nhu cầu thay đổi
                            </div>
                        </div>
                        <div>
                            <div style="font-size: 1.25rem" class="pl-3">
                                <input type="checkbox"
                                       name="reasonFour" value="other...">
                                &nbsp; Lý do khác
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">Hủy
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Gửi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
                    <th scope="col">Chức năng</th>
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
                            <td><button data-toggle="modal" data-id="{{$order->id}}" data-target="#showReasonDelete" class="btn showReasonDelRent btn-danger"
{{--                                   onclick="return confirm('Không thể hủy nhà trước ngày thuê 1 ngày, bạn chắc chứ?')"--}}
                                >Hủy</button></td>
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
