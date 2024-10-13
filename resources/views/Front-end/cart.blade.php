@extends('Front-end.layouts.master')
@section('main-content')
<style>
    .cart-page {
    padding: 20px;
}

.cart-container {
    display: flex;
    justify-content: space-between;
}

.cart-list {
    width: 80%; /* Takes 80% of the screen */
}

.cart-summary {
    width: 20%; /* Takes 20% of the screen */
    background-color: #f8f8f8; /* Light background for contrast */
    padding: 20px;
    border-radius: 8px;
}

.product-widget {
    display: flex; /* Use flex to align image and text */
    margin-bottom: 15px;
    padding: 10px;
    border: 1px solid #ddd; /* Optional: border for separation */
    border-radius: 8px;
}

.product-img {
    flex: 0 0 auto; /* Keep the image at its natural size */
    margin-right: 20px; /* Spacing between image and text */
}

.product-img img {
    max-width: 100px; /* Set a fixed width for the images */
    height: auto; /* Maintain aspect ratio */
}

.product-body {
    display: flex;
    flex-direction: column;
    justify-content: center; /* Center vertically */
    align-items: center; /* Center horizontally */
    flex-grow: 1; /* Allow the text to fill remaining space */
}

.product-name {
    font-size: 1.5em; /* Increase font size of product name */
    text-align: center; /* Center the text */
    margin: 0; /* Reset margin */
}

.product-price {
    font-size: 1.2em; /* Increase font size of product price */
    margin: 5px 0; /* Add some margin for spacing */
    text-align: center; /* Center the text */
}

.qty {
    font-weight: bold; /* Make the quantity bold */
    text-align: center; /* Center the text */
}

</style>


<div class="cart-page">
    <h1>Your Cart</h1>
    <div class="cart-container">
        <div class="cart-list">
            @if($cartItem->isEmpty())
                <p class="empty-cart-message">Your cart is empty!</p>
            @else
                @foreach($cartItem as $item)
                <div class="product-widget">
                    <div class="product-img">
                        <img src="images/{{$item->image}}" alt="">
                    </div>
                    <div class="product-body">
                        <h3 class="product-name"><a href="#">{{ $item->title }}</a></h3>
                        <h4 class="product-price"><span class="qty">{{$item->quantity}}x</span>${{ $item->price * $item->quantity }}</h4>
                    </div>
                    <a href="{{route('deletCartItem',$item->id)}}"><button class="delete"><i class="fa fa-close"></i></button></a>
                </div>
                @endforeach
            @endif
        </div>

        <div class="cart-summary">
            @if(!$cartItem->isEmpty())
                <small>{{ $cartCount }} Item(s) selected</small>
                <h5>SUBTOTAL: ${{ $grandTotal }}</h5>
                <div class="cart-btns">
                    <a href="{{route('front.products')}}">Continue Shopping</a>
                    <a href="#">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            @else
                <p><a href="{{route('front.products')}}">Continue Shopping</a></p>
            @endif
        </div>
    </div>
</div>
<!-- /CART PAGE -->

@endsection


