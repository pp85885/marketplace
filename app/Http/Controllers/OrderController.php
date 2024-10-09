<?php

namespace App\Http\Controllers;

use App\Models\{Cart, Order, OrderItem};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth};

class OrderController extends Controller
{
    public function orderHistory()
    {
        $orderQuery = Order::query();

        if(auth()->user()->role != 'admin'){
            $orderQuery->where('user_id',auth()->id());
        }
        
        $orders = $orderQuery->with('orderItems.product')->get();
        return view('order.index', compact('orders'));
    }

    public function checkout()
    {
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // Calculate total amount
        $totalAmount = 0;
        foreach ($cartItems as $item) {
            $totalAmount += $item->product->price * $item->quantity;
        }

        // Create a new order
        $order = Order::create([
            'user_id' => $user->id,
            'total_amount' => $totalAmount
        ]);

        // Create order items
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }

        // Clear the user's cart after checkout
        Cart::where('user_id', $user->id)->delete();

        return redirect()->route('order.history')->with('success', 'Order placed successfully!');
    }

    public function show($id)
    {
        $order = Order::with('orderItems.product')->findOrFail($id);
        return view('order.details', compact('order'));
    }
}
