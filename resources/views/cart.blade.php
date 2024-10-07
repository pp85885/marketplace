@extends('layouts.app')
@section('content')
    <div class="f-title">
        <h1 class="text-center">Cart </h1>
    </div>

    <div class="cart-section">
        <div class="table-heading">
            <h2 class="cart-product">Product</h2>
            <h2 class="cart-price">Price</h2>
            <h2 class="cart-quantity">Quantity</h2>
            <h2 class="cart-total">Total</h2>
        </div>

        <div class="table-content">
            <div class="cart-product">
                <div class="cart-image-box">
                    <div class="cart-images"></div>
                </div>
                <h2 class="cart-item">Lemon</h2>
                <p class="cart-description">A bag of lemons</p>
            </div>
            <div class="cart-price">
                <h3 class="price">$4.99</h3>
            </div>
            <div class="cart-quantity">
                <input type="text" name="cart-1-quantity" id="cart-1-quantity" value="1">
            </div>
            <div class="cart-total">
                <h3 class="price">$4.99</h3>
                <button type="button" class="remove" name="remove-1" id="remove-1">x</button>
            </div>
        </div>

        <div class="table-content">
            <div class="cart-product">
                <div class="cart-image-box">
                    <div class="cart-images" id="image-7"></div>
                </div>
                <h2 class="cart-item">Banana</h2>
                <p class="cart-description">A bag of bananas</p>
            </div>
            <div class="cart-price">
                <h3 class="price">$4.99</h3>
            </div>
            <div class="cart-quantity">
                <input type="text" name="cart-1-quantity" id="cart-1-quantity" value="1">
            </div>
            <div class="cart-total">
                <h3 class="price">$4.99</h3>
                <button type="button" class="remove" name="remove-2" id="remove-2">x</button>
            </div>
        </div>

        <div class="table-content">
            <div class="cart-product">
                <div class="cart-image-box">
                    <div class="cart-images" id="image-3"></div>
                </div>
                <h2 class="cart-item">Passionfruit</h2>
                <p class="cart-description">A bag of passionfruit</p>
            </div>
            <div class="cart-price">
                <h3 class="price">$4.99</h3>
            </div>
            <div class="cart-quantity">
                <input type="text" name="cart-1-quantity" id="cart-1-quantity" value="1">
            </div>
            <div class="cart-total">
                <h3 class="price">$4.99</h3>
                <button type="button" class="remove" name="remove-3" id="remove-3">x</button>
            </div>
        </div>

        <div class="coupon">
            <input type="text" name="coupon" id="coupon" placeholder="COUPON CODE">
            <button type="button" name="coupon" id="coupon">Submit</button>
        </div>

        <div class="checkout">
            <button type="button" name="update" id="update">Update</button>
            <button type="button" name="checkout" id="checkout">Checkout</button>
            <div class="final-cart-total">
                <h3 class="price">$14.97</h3>
            </div>
        </div>

        <div class="keep-shopping">
            <button type="button" name="keep-shopping" id="keep-shopping">Keep Shopping</button>
        </div>
    </div>
@endsection
