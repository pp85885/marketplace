@extends('layouts.app')
@section('content')
    <div class="f-title">
        <h1 class="text-center"> Products </h1>
    </div>
    <div class="listing-section">
        @forelse ($products as $product)
            <div class="product">
                <div class="image-box">
                    <div class="images" style="background-image: url('{{ asset('storage/products/' . $product->image) }}');">
                    </div>
                </div>
                <div class="text-box">
                    <h2 class="item"> {{ $product->title }}</h2>
                    <h3 class="price">$4.99</h3>
                    <p class="description">{{ Str::limit($product->description, 100) }}</p>
                    <button type="button" name="item-1-button" id="item-1-button">Add to Cart</button>
                </div>
            </div>
        @empty
            <h4 class="text-center text-danger">Product not found</h4>
        @endforelse
    </div>
@endsection
