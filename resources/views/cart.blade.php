@extends('layouts.app')

@section('content')
    <div class="row">
        <h2>My Cart</h2>
    </div>

    @if ($cartItems->count() > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total = 0;
                @endphp
                @foreach ($cartItems as $cartItem)
                    @php
                        $subTotal = $cartItem->product->price * $cartItem->quantity;
                        $total += $subTotal;
                    @endphp
                    <tr>
                        <td>{{ $cartItem->product->title }}</td>
                        <td>{{ $cartItem->quantity }}</td>
                        <td>${{ $cartItem->product->price }}</td>
                        <td>${{ $subTotal }}</td>
                        <td>
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="{{ route('cart.update', $cartItem->id) }}" method="POST">
                                        @csrf
                                        <input type="number" name="quantity" value="{{ $cartItem->quantity }}" min="1">
                                        <button type="submit">Update</button>
                                    </form>
                                </div>

                                <div class="col-md-6">
                                    <form action="{{ route('cart.remove', $cartItem->id) }}" method="POST">
                                        @csrf
                                        <button type="submit">Remove</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-10">
                <p>Total: ${{ $total }}</p>
            </div>
            <div class="col-md-2">
                <a class="btn btn-success" href="{{ route('checkout') }}">Checkout</a>
            </div>
        </div>
    @else
        <p>Your cart is empty.</p>
    @endif
@endsection
