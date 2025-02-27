@extends('admin.layouts.admin-masterpage')

@section('content')
<div class="container">
    <div class="page-inner">
      
      <div class="row">
        <form action="{{ route('admin.products.addStock', $product) }}" method="POST" class="col-md-12">
            @csrf
            
                @method('PUT') <!-- Only include PUT if $product is set (edit mode) -->
            
          <div class="card">
            <div class="card-header">
              <div class="card-title">Products</div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="form-group form-inline">
                        <label
                          for="inlineinput"
                          class="col-md-3 col-form-label"
                          >Name</label>

                        <div class="col-md-9 p-0">
                          <input
                            type="text"
                            class="form-control input-full"
                            name="name"
                            placeholder="Name"
                            value="{{ isset($product) ? $product->name : ""}}"
                          />
                        </div>
                        
                    </div>


                    <div class="form-group">
                        <label for="comment">description</label>
                        <textarea class="form-control" id="comment" rows="5" name="description">{{ isset($product) ? $product->description : ""}}</textarea>
                    </div>

                    <div class="form-group form-group-default">
                        <label>Select</label>
                        <select class="form-select" name="category_id">
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}" @if (isset($product))
                                @if ($category->id == $product->id)
                                    {{"selected"}}
                                @endif
                            @endif>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">$</span>
                        <input type="text" class="form-control" name="price" aria-label="Amount (to the nearest dollar)" value="{{ isset($product) ? $product->price : ""}}">
                    </div>

                    <div class="form-group form-inline">
                        <label for="inlineinput" class="col-md-3 col-form-label">stock number</label>
                        <div class="col-md-9 p-0">
                          <input type="text" class="form-control input-full" name="stock" id="inlineinput" placeholder="stock number" value="{{ isset($product) ? $product->stock : ""}}">
                        </div>
                    </div>


                    
                  
                    


                    

                    </div>
                    


                      
                  



                </div>
                
            </div>
            <div class="card-action">
              <button type="submit" class="btn btn-success">Submit</button>
              <a href="{{route('admin.products')}}" type="button" class="btn btn-danger">Cancel</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

    
@endsection
