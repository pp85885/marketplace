@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Order Details</h1>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <strong>Order ID:</strong> #{{ $order->id }} <br>
                <strong>Order Date:</strong> {{ $order->created_at->format('d M Y') }} <br>
                <strong>Total Amount:</strong> ${{ number_format($order->total_amount, 2) }}
            </div>

            <div class="card-body">
                <h4>Items:</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderItems as $item)
                            <tr>
                                <td>{{ $item->product->title ?? 'NA' }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>${{ number_format($item->price, 2) }}</td>
                                <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    <h5><strong>Grand Total: </strong>${{ number_format($order->total_amount, 2) }}</h5>
                </div>
            </div>
        </div>
    </div>
@endsection
