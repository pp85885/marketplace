@extends('layouts.app')
@section('content')
    <h2>Create Product</h2>
    <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">title</label>
            <input type="text" class="form-control" name="title" />
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="text" class="form-control" name="price" />
            @error('price')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">File</label>
            <input type="file" class="form-control" name="file" />
            @error('file')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
