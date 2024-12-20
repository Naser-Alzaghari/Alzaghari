@extends('user.layouts.master')


@section('content')

    <!-- Main Content Wrapper Start -->
    <div id="content" class="main-content-wrapper">
        <div class="page-content-inner">
            <div class="container">
                <form action="{{ route('place_order') }}" class="payment-form" method="POST" id="checkout-form">
                <div class="row pt--150 pb--80 pb-md--60 pb-sm--40">
                    
<!-- Checkout Area Start -->
                    <div class="col-lg-6">
                        <div class="checkout-title mt--10">
                            <h2>Billing Details</h2>
                        </div>
                        <div class="checkout-form">
                                <div class="row mb--30">
                                    <div class="form__group col-12">
                                        <label for="billing_fname" class="form__label form__label--2">Name
                                            <span class="required">*</span></label>
                                        <input type="text" name="billing_fname" id="billing_fname"
                                            class="form__input form__input--2" value="{{Auth::user()->name}}">
                                    </div>
                                    
                                </div>
                                <div class="row mb--30">
                                    <div class="form__group col-12">
                                        <label for="billing_email" class="form__label form__label--2">Email Address
                                            <span class="required">*</span></label>
                                        <input type="email" name="billing_email" id="billing_email"
                                            class="form__input form__input--2" value="{{Auth::user()->email}}" disabled>
                                    </div>
                                </div>
                                <div class="row mb--30">
                                    <div class="form__group col-12">
                                        <label for="address" class="form__label form__label--2">Address
                                            <span class="required">*</span></label>
                                        <input type="text" name="address" id="address"
                                            class="form__input form__input--2" value="{{Auth::user()->address ?? ''}}">
                                    </div>
                                </div>
                                
                                <div class="row mb--30">
                                    <div class="form__group col-12">
                                        <label for="phone_number" class="form__label form__label--2">Phone <span
                                                class="required">*</span></label>
                                        <input type="text" name="phone_number" id="phone_number"
                                            class="form__input form__input--2" value="{{Auth::user()->phone_number ?? ''}}">
                                    </div>
                                </div>
                                
                                
                                <div class="row">
                                    <div class="form__group col-12">
                                        <label for="order_notes" class="form__label form__label--2">Order
                                            Notes</label>
                                        <textarea class="form__input form__input--2 form__input--textarea"
                                            id="order_notes" name="order_notes"
                                            placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-xl-5 offset-xl-1 col-lg-6 mt-md--40">
                        <div class="order-details">
                            <div class="checkout-title mt--10">
                                <h2>Your Order</h2>
                            </div>
                            <div class="table-content table-responsive mb--30">
                                <table class="table order-table order-table-2">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th class="text-end">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartItems as $item)
                                        <tr>
                                            <th>{{$item['product']->name}}
                                                <strong><span>&#10005;</span>{{$item['quantity']}}</strong>
                                            </th>
                                            <td class="text-end">${{($item['product']->price_after_discount ?? $item['product']->price) * $item['quantity']}}</td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            <td class="text-end">${{$total}}</td>
                                        </tr>
                                        <tr class="shipping">
                                            <th>Shipping</th>
                                            <td class="text-end">
                                                <span>$0.00</span>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td class="text-end"><span class="order-total-ammount"><strong>${{$total}}</strong></span>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="checkout-payment">
                                
                                    @csrf
                                    @foreach ($cartItems as $item)
                                        <input type="hidden" name="cartItems[{{ $item['product']->id }}][product_id]" value="{{ $item['product']->id }}">
                                        <input type="hidden" name="cartItems[{{ $item['product']->id }}][name]" value="{{ $item['product']->name }}">
                                        <input type="hidden" name="cartItems[{{ $item['product']->id }}][price]" value="{{ $item['product']->price }}">
                                        <input type="hidden" name="cartItems[{{ $item['product']->id }}][quantity]" value="{{ $item['quantity'] }}">
                                    @endforeach

                                    <input type="hidden" value="{{ str_replace(',', '', $total) }}" name="total">
                                    {{-- <input type="hidden" value="{{$cartItems}}" name="cartItems"> --}}
                                    
                                    <div class="payment-group mb--10">
                                        <div class="payment-radio">
                                            <input type="radio" value="cash" name="payment-method" id="cash" checked>
                                            <label class="payment-label" for="cash">
                                                CASH ON DELIVERY
                                            </label>
                                        </div>
                                        <div class="payment-info cash hide-in-default" data-method="cash">
                                            <p>Pay with cash upon delivery.</p>
                                        </div>
                                    </div>
                                    
                                    <div class="payment-group mb--10">
                                        <div class="payment-radio">
                                            <input type="radio" value="paypal" name="payment-method" id="paypal">
                                            <label class="payment-label" for="paypal">
                                                Pay with PayPal
                                            </label>
                                        </div>
                                        <div class="payment-info paypal hide-in-default" data-method="paypal">
                                            <div id="paypal-button-container"></div>
                                        </div>
                                    </div>
                                    <div class="payment-group mt--20">
                                        <p class="mb--15">Your personal data will be used to process your order,
                                            support your experience throughout this website, and for other purposes
                                            described in our privacy policy.</p>
                                        <button type="submit" class="btn btn-fullwidth btn-style-1">Place
                                            Order</button>
                                    </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- Checkout Area End -->
                    
                    
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- Main Content Wrapper Start -->


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('checkout-form');
            const cashRadio = document.getElementById('cash');
            const paypalRadio = document.getElementById('paypal');
    
            cashRadio.addEventListener('change', function() {
                if (this.checked) {
                    form.action = "{{ route('place_order') }}";
                }
            });
    
            paypalRadio.addEventListener('change', function() {
                if (this.checked) {
                    form.action = "{{ route('paypal') }}";
                }
            });
        });
    </script>
    


@endsection

