@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Orders</h1>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>User</th>
                    <th>Total Amount</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->total_amount }}</td>
                        <td>
                            <a href="{{ route('order.details', $order->id) }}" class="btn btn-primary">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
