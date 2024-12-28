@extends('user.layouts.master')

@section('content')
<div id="content" class="main-content-wrapper">
    <div class="page-content-inner">
        <div class="container">
            <div class="row pt--150 pb--80 pt-md--45 pt-sm--25 pb-md--60 pb-sm--40 cart-page-inner">
                @if ($cartItems->isNotEmpty())
                <div class="col-lg-8 mb-md--30">
                    <form class="cart-form" action="#">
                        <div class="row g-0">
                            <div class="col-12">
                                <div class="table-content table-responsive">
                                    <table class="table text-center table-bordered table-hover" style="table-layout: auto; width: 100%;">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                                <th class="text-start">Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th class="px-3">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($cartItems as $item)
                                                <tr data-product-id="{{ $item['product']->id }}">
                                                    <td class="product-remove">
                                                        <a href="#" class="remove-cart-item text-danger" data-product-id="{{ $item['product']->id }}">
                                                            <i class="dl-icon-close"></i>
                                                        </a>
                                                    </td>
                                                    <td class="product-thumbnail text-start p-3">
                                                        @if ($item['product']->images->isNotEmpty())
                                                            <img src="{{ asset('storage/' . $item['product']->images[0]->image_url) }}" alt="Product Thumbnail" class="img-thumbnail" style="width: 60px;">
                                                        @else
                                                            <img src="{{ asset('storage/images/default_product.png') }}" alt="Product Thumbnail" class="img-thumbnail" style="width: 60px;">
                                                        @endif
                                                    </td>
                                                    <td class="product-name text-start wide-column">
                                                        <h5>
                                                            <a href="product-details.html" class="text-decoration-none">{{ $item['product']->name }}</a>
                                                        </h5>
                                                    </td>
                                                    <td class="product-price">
                                                        <span class="product-price-wrapper">
                                                            <span class="money" data-price="{{ $item['product']->price_after_discount ?? $item['product']->price }}">${{ $item['product']->price_after_discount ?? $item['product']->price }}</span>
                                                        </span>
                                                    </td>
                                                    <td class="product-quantity" style="min-width: 150px;">
                                                        <div class="quantity d-flex justify-content-center align-items-center">
                                                            <button type="button" class="btn btn-outline-secondary update-cart-quantity d-flex align-items-center justify-content-center" data-product-id="{{ $item['product']->id }}" data-action="decrease" style="width: 32px; height: 32px; padding: 0 1rem; background-color: #212529; color: white; border: none;">-</button>
                                                            <input type="number" class="text-center quantity-input mx-2" name="qty" data-product-id="{{ $item['product']->id }}" value="{{ $item['quantity'] }}" min="1" style="width: 50px;" readonly>
                                                            <button type="button" class="btn btn-outline-secondary update-cart-quantity d-flex align-items-center justify-content-center" data-product-id="{{ $item['product']->id }}" data-action="increase" style="width: 32px; height: 32px; padding: 0 1rem; background-color: #212529; color: white; border: none;">+</button>
                                                        </div>
                                                    </td>
                                                    <td class="product-total-price">
                                                        <span class="product-price-wrapper">
                                                            <span class="money" id="item-total-{{ $item['product']->id }}">
                                                                <strong>${{ ($item['product']->price_after_discount ?? $item['product']->price) * $item['quantity'] }}</strong>
                                                            </span>
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                        </div>
                        <hr>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="cart-collaterals">
                        <div class="cart-totals">
                            <h5 class="mb--15">Cart totals</h5>
                            <div class="table-content table-responsive">
                                <table class="table order-table">
                                    <tbody>
                                        <tr>
                                            <th>Subtotal</th>
                                            <td id="cart-subtotal">${{ $total }}</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping</th>
                                            <td><span>$0.00</span></td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td>
                                                <span class="product-price-wrapper">
                                                    <span class="money" id="cart-total">${{ $total }}</span>
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <a href="{{ route('checkout') }}" class="btn btn-fullwidth btn-style-1">Proceed To Checkout</a>
                    </div>
                </div>
                @else
                <h1 class="mb-3"><b>Cart</b></h1>

                <div class="text-center">
                    <h1 class="text-center p-4">Your Cart is empty</h1>
                    <a href="{{route('landing_page')}}" class="btn btn-color-gray btn-medium btn-bordered btn-style-1">Back to home</a>
                </div>
                @endif
                
            </div>
        </div>
    </div>
</div>
@endsection