@extends('Admin.layouts.master')


@section('main-content')

    <div class="container">
        <h1>brands</h1>

        <a href="{{ route('brand.create') }}" class="btn btn-primary mb-3">Add New brand</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($brands as $brand)
                    <tr>
                        <td>{{ $brand->name }}</td>
                        <td>{{ $brand->slug }}</td>
                        <td>
                            <a href="{{ route('brand.edit', $brand->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{ route('brand.delete', $brand->id) }}" class="btn btn-danger btn-sm">Delete</a>

                           
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
