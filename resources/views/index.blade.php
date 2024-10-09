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
                    <h3 class="price">${{ $product->price }}</h3>
                    <p class="description">{{ Str::limit($product->description, 100) }}</p>
                    
                    {{-- authenticated users access add to cart btn --}}
                    @auth
                        <button type="button" class="cartBtn" data-product-id="{{ $product->id }}">Add to Cart</button>
                    @endauth
                </div>
            </div>
        @empty
            <h4 class="text-center text-danger">Product not found</h4>
        @endforelse
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.cartBtn').on('click', function() {
                var productId = $(this).data('product-id');

                $.ajax({
                    url: "{{ route('cart.add') }}",
                    type: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        product_id: productId,
                        quantity: 1
                    },
                    success: function(response) {
                        if (response.status) {
                            toastr.success('product added to cart');
                        } else {
                            toastr.error('Something went wrong!');
                        }
                    },
                    error: function(xhr) {
                        toastr.error('Failed to add product to cart.');
                    }
                });
            });
        });
    </script>
@endsection
