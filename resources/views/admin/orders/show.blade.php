@extends('admin.layouts.admin-masterpage')

@section('content')
<div class="container">
  <div class="page-inner pb-0">
    <div class="card">
        <div class="card-body">
          <div class="customer-info">
            <h2>Customer Information</h2>
            <hr>
            <p><strong>Name:</strong> {{$order->user->name}}</p>
            <p><strong>Address:</strong> {{$order->address}}</p>
            <p><strong>Phone Number: </strong><a href="tel:{{$order->phone_number}}">{{$order->phone_number}}</a></p>
            <p><strong>Email: </strong><a href="mailto:{{$order->user->email}}">{{$order->user->email}}</a></p>
          </div>
        </div>
    </div>
  </div>

    <div class="page-inner">
        <div class="card">
          <div class="card-body">
            <h2>Order details</h2>
              <hr>
          </div>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">quintety</th>
                    <th scope="col">price</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($order->orderItems as $item)
                    
                    <tr>
                        <td>{{ $item->product->name }}</td> <!-- Assuming there's a `product` relationship -->
                        <td>{{ $item->quantity }}</td>
                        <td>${{ $item->price * $item->quantity }}</td>
                    </tr>
                @endforeach
                <tr>
                  <th class="bg-light" colspan="2">total amount:</th>
                  <th class="bg-light">${{ $order->total_amount }}</th>
              </tr>
                </tbody>
                </table>
                @if ($order->order_notes)
                <div class="form-group">
                  <label class="control-label"> Comment: </label>
                  <p class="form-control-static">{{$order->order_notes}}</p>
                </div>
                @endif
            </div>
            <a href="{{route('admin.orders')}}" type="button" class="btn btn-danger">back</a>
        </div>
    </div>
    
  </div>

  

@endsection
