@extends('layouts.app')
@section('content')
    <h2>All Products</h2>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">title</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $key => $product)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <th><img src="{{ asset('storage/products/' . $product->image) }}" alt="img" width="150"></th>
                    <th>{{ $product->title }}</th>
                    <th>{{ Str::limit($product->description, 200) }}</th>
                    <th>
                        <a href="{{ route('products.edit', encrypt($product->id)) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('products.delete', encrypt($product->id)) }}" class="btn btn-danger">Delete</a>
                    </th>
                </tr>
            @empty
                <h4 class="text-center text-danger">Products not found</h4>
            @endforelse
        </tbody>
    </table>
@endsection
