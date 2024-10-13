@extends('Admin.layouts.master')

@section('main-content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">SUPER ADMIN</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Super Admin</li>
            </ol>
        </div>
    </div>
</div>
<form class="form" name="formEdit" id="formEdit" method="POST" action="{{ route('brand.update', $brand->id) }}" enctype="multipart/form-data">
    @csrf    
    <div class="row">
        <div class="form-group col-6">
            <label>Name</label>
            <input type="text" class="form-control" name="name" value="{{ $brand->name }}" required>
        </div>
        <div class="form-group col-6">
            <label>Slug</label>
            <input type="text" class="form-control" name="slug" value="{{ $brand->slug }}" required>
        </div>
    </div>
    
    <div class="form-group row">
        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
        <a href="{{ route('brand.index') }}" class="btn btn-danger waves-effect waves-light">Cancel</a>
    </div>
</form>

@endsection
