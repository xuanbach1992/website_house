@extends('admin.layout.master')

@section('contentAdmin')

    <div class="card mt-4" style="width: 100%">
        <div class="card-header"><h5>Quản lý nhà</h5></div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên Nhà</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Kiểu nhà</th>
                    <th scope="col">Giá</th>
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
                            @if($value->status == 1)
                                <span style="color: #ff0013">Chưa cho thuê</span>
                            @elseif($value->status == 2)
                                <span style="color: #0bff00">Đã cho thuê</span>
                            @elseif($value->status == 3)
                                <span style="color: #0004ff">Chờ xác nhận</span>
                            @endif
                        </td>
                        <td>
                            @foreach($listHouseCategory as $houseCategory)
                                @if($value->house_category_id == $houseCategory->id)
                                    {{$houseCategory->name}}
                                @endif
                            @endforeach
                        </td>
                        <td>{{$value->price}}</td>
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

@endsection
