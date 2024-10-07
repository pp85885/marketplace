@extends('layouts.app')
@section('content')
    <div class="f-title">
        <h1> Products </h1>
    </div>
    <div class="widget-content popular">
        <ul>
            @forelse ($products as $product)
                <li>
                    <div class="item-thumbnail">
                        <img src="{{ asset('storage/products/' . $product->image) }}" alt="img">
                        <span class="title">
                            {{ $product->title }}
                        </span>
                        <div>
                            {{ Str::limit($product->description, 100) }}
                        </div>
                        <a href="{{ route('products.like', $product->id) }}" class="btn btn-success">Like</a>
                    </div>
                    <div style="clear: both;"></div>
                </li>
            @empty
                <h4 class="text-center text-danger">Product not found</h4>
            @endforelse
        </ul>
    </div>
@endsection
