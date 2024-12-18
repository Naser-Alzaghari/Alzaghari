@extends('user.layouts.master')

@section('content')
<div id="content" class="main-content-wrapper">
    <div class="page-content-inner">
        <div class="container">
            <div class="row pt--150 pb--80 pt-md--45 pt-sm--25 pb-md--60 pb-sm--40">
                <div class="col-12 text-center">
                    <h1 class="mb--30">Thank You for Your Order!</h1>
                    <p class="mb--30">We appreciate your business. Your order is being processed and you will receive an email confirmation shortly.</p>
                    <div class="btn-group gap-5">
                        <a href="{{ route('landing_page') }}" class="btn btn-style-1">Back to Home</a>
                        <a href="{{ route('view_orders') }}" class="btn btn-style-1">View Your Orders</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
