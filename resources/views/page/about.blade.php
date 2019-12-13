@extends('layouts.app')

@section('content')

    <section class="content-header">
        <h1>
            Edit Product
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Product</a></li>
            <li class="active">Edit</li>
        </ol>
    </section>
    <section class="content ">
        @if(count($errors) >0)
            <ul>
                @foreach($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @endforeach
            </ul>
    @endif
    <!-- enctype="multipart/form-data" class="dropzone dz-clickable" -->
        <form action="{{ url('admincp/product') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Info</h3>
                    </div>
                    <div class="box-body ">
                        <div class="form-group col-md-12">
                            <label>Name</label>
                            <input type="text" name="txtName" class="form-control" value="">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Desc</label>
                            <textarea name="txtDesc" class="form-control"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Content</label>
                            <textarea name="txtContent" class="form-control"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Price</label>
                            <input name="txtPrice" class="form-control"
                                   value="">
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">SEO Infomation</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group col-md-12">
                            SEO Title <input type="text" name="meta_title" class="form-control"  value="{{ old('meta_title') }}">
                            Meta Keywords <input type="text" name="meta_key" class="form-control"  value="{{ old('meta_key') }}">
                            Meta Description <input type="text" name="meta_desc" class="form-control"  value="{{ old('meta_desc') }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="dropzone" id="my-dropzone" name="myDropzone">

                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-success pull-right">
                    <i class="fa fa-save"></i>
                    <span>Save and back</span>
                </button>
            </div>
        </form>

    </section>

@endsection
