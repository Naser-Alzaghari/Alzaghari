@extends('admin.layouts.admin-masterpage')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="card">
            
            <div class="card-body">
              
              <table class="table mt-3">
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
        </div>
        <a href="{{route('admin.orders')}}" type="button" class="btn btn-danger">back</a>
    </div>
    
  </div>

  

@endsection
