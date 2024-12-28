@extends('admin.layouts.admin-masterpage')

@section('content')
<div class="container">
    <div class="page-inner">
      
      <div class="row">
        <form action="{{ !isset($order) ? route('admin.orders.store') : route('admin.orders.update', $order) }}" method="POST" class="col-md-12">
            @csrf
            @if(isset($order))
                @method('PUT') <!-- Only include PUT if $order is set (edit mode) -->
            @endif
          <div class="card">
            <div class="card-header">
              <div class="card-title">Orders</div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6 col-lg-4">
                    

                    <div class="form-group form-group-default">
                      <label>State</label>
                      <select class="form-select" name="status">
                          @foreach ($states as $state)
                          <option value="{{$state}}" @if (isset($order))
                              @if ($order->status == $state)
                                  {{"selected"}}
                              @endif
                          @endif>{{$state}}</option>
                          @endforeach
                      </select>
                  </div>


                  <div class="form-group form-group-default">
                    <label>payment_status</label>
                    <select class="form-select" name="payment_status">
                        @foreach ($payment_status as $state)
                        <option value="{{$state}}" @if (isset($order))
                            @if ($order->payment_status == $state)
                                {{"selected"}}
                            @endif
                        @endif>{{$state}}</option>
                        @endforeach
                    </select>
                </div>

                <p class="mb-0">final price</p>
                <div class="input-group mb-3">
                  <span class="input-group-text">$</span>
                  
                  <input type="text" class="form-control" name="total_amount_after_discount" aria-label="Amount (to the nearest dollar)" value="{{ isset($order) ? $order->total_amount_after_discount : ""}}">
              </div>


                    </div>
                </div>
                
            </div>
            <div class="card-action">
              <button type="submit" class="btn btn-success">Submit</button>
              <a href="{{route('admin.orders')}}" type="button" class="btn btn-danger">Cancel</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

@endsection
