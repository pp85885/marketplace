<?php

namespace App\Http\Controllers;


use App\Models\{Product, Cart};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth};

class CartController extends Controller
{
    // Add product to the cart or update quantity
    public function addToCart(Request $request)
    {
        $productId = $request->product_id;
        $user = Auth::user();
        $product = Product::findOrFail($productId);
        $quantity = $request->input('quantity', 1);

        // Check if the product is already in the user's cart
        $cartItem = Cart::where('user_id', $user->id)->where('product_id', $productId)->first();

        if ($cartItem) {
            // Update the quantity if the item already exists in the cart
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            // Create a new cart item if it doesn't exist
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'quantity' => $quantity,
            ]);
        }

        return response()->json(['status' => true, 'message' => 'Product added to cart successfully']);
    }

    // Update product quantity in the cart
    public function updateCart(Request $request, $cartItemId)
    {
        $user = Auth::user();
        $cartItem = Cart::where('user_id', $user->id)->findOrFail($cartItemId);
        $quantity = $request->input('quantity');

        // Update the quantity of the product in the cart
        if ($quantity > 0) {
            $cartItem->quantity = $quantity;
            $cartItem->save();
        } else {
            // If quantity is 0 or less, remove the item from the cart
            $cartItem->delete();
        }

        return back()->with('success', 'Cart updated successfully!');
    }

    // Remove product from the cart
    public function removeFromCart($cartItemId)
    {
        $user = Auth::user();
        $cartItem = Cart::where('user_id', $user->id)->findOrFail($cartItemId);

        $cartItem->delete();

        return back()->with('success', 'Product removed from cart.');
    }

    // View cart items
    public function viewCart()
    {
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->with('product')->get();

        return view('cart', compact('cartItems'));
    }
}
