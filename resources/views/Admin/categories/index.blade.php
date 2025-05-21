@extends('Admin.layouts.master')


@section('main-content')

    <div class="container">
        <h1>Categories</h1>

        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Add New Category</a>

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
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{ route('categories.delete', $category->id) }}" class="btn btn-danger btn-sm">Delete</a>
                           
                        </td>
  
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
