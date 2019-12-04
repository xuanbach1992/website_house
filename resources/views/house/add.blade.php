@extends('layouts.app')

@section('content')
    <div class="col-lg-8">
        <form method="post" action="">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1"><h6>Tên chủ nhà : </h6></label>
                <input type="text" class="form-control" placeholder="Nhập tên chủ nhà">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1"><h6>Loại nhà : </h6></label>
                <input type="text" class="form-control" placeholder="Nhập loại nhà">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1"><h6>Loại phòng : </h6></label>
                <input type="text" class="form-control" placeholder="Nhập loại phòng">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1"><h6>Địa chỉ : </h6></label>
                <input type="text" class="form-control" placeholder="Nhập địa chỉ">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1"><h6>Số lượng phòng ngủ : </h6></label>
                <input type="text" class="form-control" placeholder="Nhập số phòng ngủ">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1"><h6>Số lượng phòng tắm : </h6></label>
                <input type="text" class="form-control" placeholder="Nhập số phòng tắm">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1"><h6>Ảnh phòng : </h6></label>
                <input type="file" class="form-control" >
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1"><h6>Mô tả : </h6></label>
                <textarea class="form-control"  rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1"><h6>Giá tiền theo đêm : </h6></label>
                <input type="text" class="form-control" placeholder="Nhập giá phòng">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
@endsection
