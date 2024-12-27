@extends('admin.layouts.admin-masterpage')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="card">
            <div class="card-header">
              <div class="card-title">Basic Table</div>
            </div>
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
            </div>
        </div>
        <a href="{{route('admin.orders')}}" type="button" class="btn btn-danger">back</a>
    </div>
    
  </div>

  

@endsection
