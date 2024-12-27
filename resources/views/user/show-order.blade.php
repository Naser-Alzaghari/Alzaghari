@extends('user.layouts.master')

@section('content')
<div id="content" class="main-content-wrapper">
    <div class="page-content-inner">
        <div class="container">
            <div class="row pt--150 pt-md--60 pt-sm--40 pb--80 pb-md--60 pb-sm--40">
                <div class="col-12">
                    <div class="user-dashboard-tab flex-column flex-md-row">
                        <div class="user-dashboard-tab__head nav flex-md-column" role="tablist"
                            aria-orientation="vertical">
                            <a class="nav-link" data-toggle="pill" role="tab" href="{{ route('my_account') }}"
                                aria-controls="dashboard" aria-selected="true">Account Details</a>
                            <a class="nav-link active" data-toggle="pill" role="tab" href="{{ route('view_orders') }}"
                                aria-controls="orders" aria-selected="true">Orders</a>
                            <form method="POST" action="{{ route('logout') }}" id="logout_form">
                                @csrf
                                <a class="nav-link" href="javascript:{}" onclick="document.getElementById('logout_form').submit();">Logout</a>
                                {{-- <button class="nav-link" type="submit">
                                    Logout
                                </button> --}}
                            </form>
                        </div>
                        <div class="user-dashboard-tab__content tab-content d-flex justify-content-center">
                            <div class="col-xl-9 offset-xl-1 col-lg-9 mt-md--40">
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
                                                
                                                {{-- @foreach($order->orderItems as $item)
                    
                                                    <tr>
                                                        <td>{{ $item->product->name }}</td> <!-- Assuming there's a `product` relationship -->
                                                        <td>{{ $item->quantity }}</td>
                                                        <td>{{ $item->price * $item->quantity }}</td>
                                                    </tr>
                                                @endforeach --}}
                                                @foreach ($order->orderItems as $item)
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
                                                    <td class="text-end">${{$order->total_amount_after_discount ?? $order->total_amount}}</td>
                                                </tr>
                                                <tr class="shipping">
                                                    <th>Shipping</th>
                                                    <td class="text-end">
                                                        <span>$0.00</span>
                                                    </td>
                                                </tr>
                                                <tr class="order-total">
                                                    <th>Order Total</th>
                                                    <td class="text-end"><span class="order-total-ammount"><strong>${{$order->total_amount_after_discount ?? $order->total_amount}}</strong></span>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection