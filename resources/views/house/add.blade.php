@extends('layouts.app')

@section('content')
    <div class="col-lg-8">
        <form method="post" action="{{route('house.add')}}">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1"><h6>Tên chủ nhà : </h6></label>
                <input type="text" class="form-control" name="name" placeholder="Nhập tên chủ nhà">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1"><h6>Loại nhà : </h6></label>
                <input type="text" class="form-control" name="house_type" placeholder="Nhập loại nhà">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1"><h6>Loại phòng : </h6></label>
                <input type="text" class="form-control" name="room_type" placeholder="Nhập loại phòng">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1"><h6>Địa chỉ : </h6></label>
                <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1"><h6>Số lượng phòng ngủ : </h6></label>
                <input type="text" class="form-control" name="bedrooms" placeholder="Nhập số phòng ngủ">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1"><h6>Số lượng phòng tắm : </h6></label>
                <input type="text" class="form-control" name="bathroom" placeholder="Nhập số phòng tắm">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1"><h6>Ảnh phòng : </h6></label>
                <input type="file" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1"><h6>Mô tả : </h6></label>
                <textarea class="form-control" name="description" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1"><h6>Giá tiền theo đêm : </h6></label>
                <input type="text" class="form-control" name="price" placeholder="Nhập giá phòng">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
@endsection
