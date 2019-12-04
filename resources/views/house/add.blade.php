@extends('layouts.app')

@section('content')
    <div class="col-lg-8">
        <form method="post" action="">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1"><h5>Tên chủ nhà : </h5></label>
                <input type="text" class="form-control" placeholder="Nhập tên chủ nhà">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1"><h5>Loại nhà : </h5></label>
                <input type="text" class="form-control" placeholder="Nhập loại nhà">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1"><h5>Loại phòng : </h5></label>
                <input type="text" class="form-control" placeholder="Nhập loại phòng">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1"><h5>Địa chỉ : </h5></label>
                <input type="text" class="form-control" placeholder="Nhập địa chỉ">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1"><h5>Số lượng phòng ngủ : </h5></label>
                <input type="text" class="form-control" placeholder="Nhập số phòng ngủ">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1"><h5>Số lượng phòng tắm : </h5></label>
                <input type="text" class="form-control" placeholder="Nhập số phòng tắm">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1"><h5>Ảnh phòng : </h5></label>
                <input type="file" class="form-control" >
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1"><h5>Mô tả : </h5></label>
                <textarea class="form-control"  rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1"><h5>Giá tiền theo đêm : </h5></label>
                <input type="text" class="form-control" placeholder="Nhập giá phòng">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
@endsection
