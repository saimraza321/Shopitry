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
   <div class="card">
        <div class="card-body">
            <h3 class="card-title">Add categories</h3>
            <form class="form" name="formCreate" id="formCreate" method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                @csrf
           
                <div class="row">
                    <div class="form-group col-6">
                
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group col-6">
                
                        <label>Slug</label>
                        <input type="text" class="form-control" name="slug" required>
                    </div>
                </div>
               
                
                <div class="form-group row">
                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                    <a href="/organizer" class="btn btn-danger waves-effect waves-light">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
