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
                            <a href="{{route('newproduct.create')}}">      <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button> </a>
                        </div>
                    </div>
                </div>

<div class="card">
        <div class="card-body">
            <h4 class="card-title">Products</h4>
            
            <div class="table-responsive">
                <table class="table color-table dark-table">
                    <thead>
                        <tr>
                            
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Actions</th>
                            
                        </tr>
                    </thead>
                    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category_name }}</td>
            <td>{{ $product->price }}</td>
            <td><img src="/images/{{$product->image}}"height="70"width="70" alt=""></td>
            <td style="display:flex">
                <a href="{{ route('newproduct.edit', $product->id) }}" class="btn btn-info" style="margin-right:5px;"><i class="fa fa-edit"></i></a>
                <a href="{{ route('newproduct.delete', $product->id) }}" class="btn btn-danger" onclick="showDeleteConfirmation(products, {{ $product->id }})"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
    @endforeach
</tbody>
                </table>
            </div>
        </div>
    </div>

@endsection