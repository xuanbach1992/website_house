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
                    <th scope="col">Chức năng</th>
                </tr>
                </thead>
                @foreach($houses as $key => $value)
                    <tbody>
                    <tr>
                        <th scope="row">{{++$key}}</th>
                        <td>{{$value->name}}</td>
                        <td>
                            @foreach($listCities as $houseType)
                                @if($value->cities_id == $houseType->id)
                                    {{$houseType->name}}
                                @endif
                            @endforeach
                        </td>
                        <td>{{$value->status}}</td>
                        <td>
                            @foreach($listHouseCategory as $houseCategory)
                                @if($value->house_category_id == $houseCategory->id)
                                    {{$houseCategory->name}}
                                @endif
                            @endforeach
                        </td>
                        <td>{{$value->price}}</td>
                        <td>
                            <a href="" class="btn btn-primary">Sửa</a>&nbsp;&nbsp;
                            <a href="" class="btn btn-primary">Xóa</a>
                        </td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>

@endsection
