@extends('user.layouts.master')

@section('content')

<style>
    /* Responsive cart table styles */
@media screen and (max-width: 767px) {
    .cart-form .table {
        display: block;
        width: 100%;
    }

    .cart-form .table thead {
        display: none; /* Hide header on mobile */
    }

    .cart-form .table tbody {
        display: block;
        width: 100%;
    }

    .cart-form .table tbody tr {
        display: block;
        margin-bottom: 1.5rem;
        padding: 1rem;
        border: 1px solid #dee2e6;
        border-radius: 0.25rem;
    }

    .cart-form .table tbody td {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.5rem 0;
        border: none;
        text-align: right;
    }

    /* Product thumbnail styling */
    .cart-form .table td.product-thumbnail {
        display: block;
        text-align: center;
        padding: 1rem 0;
    }

    .cart-form .table td.product-thumbnail img {
        width: 120px;
        margin: 0 auto;
    }

    /* Product name styling */
    .cart-form .table td.product-name {
        display: block;
        text-align: center;
        padding: 0.5rem 0;
    }

    /* Remove button styling */
    .cart-form .table td.product-remove {
        position: absolute;
        top: 0.5rem;
        right: 0.5rem;
        padding: 0;
        border: none;
    }

    /* Add labels for mobile view */
    .cart-form .table td.product-price:before {
        content: "Price:";
        font-weight: 600;
    }

    .cart-form .table td.product-quantity:before {
        content: "Quantity:";
        font-weight: 600;
    }

    .cart-form .table td.product-total-price:before {
        content: "Total:";
        font-weight: 600;
    }

    /* Quantity input styling */
    .cart-form .table td.product-quantity {
        padding: 1rem 0;
    }

    .cart-form .table .quantity {
        margin: 0;
        justify-content: flex-end;
    }

    /* Ensure proper spacing between elements */
    .cart-form .table td.product-price,
    .cart-form .table td.product-quantity,
    .cart-form .table td.product-total-price {
        margin: 0.5rem 0;
    }

    .table tbody td.product-quantity .quantity {
      margin-right: 0;
      }
}
</style>
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
                                    <table class="table text-center table-bordered">
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
                                                    <td class="product-thumbnail text-start">
                                                        @if ($item['product']->images->isNotEmpty())
                                                            <img src="{{ asset('storage/' . $item['product']->images[0]->image_url) }}" alt="Product Thumbnail" class="img-thumbnail">
                                                        @else
                                                            <img src="{{ asset('storage/images/default_product.png') }}" alt="Product Thumbnail" class="img-thumbnail">
                                                        @endif
                                                    </td>
                                                    <td class="product-name text-start">
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