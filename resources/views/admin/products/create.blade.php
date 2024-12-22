@extends('admin.layouts.admin-masterpage')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Product Form</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Forms</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Product Form</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <form action="{{ !isset($product) ? route('admin.products.store') : route('admin.products.update', $product) }}" method="POST" class="col-12" enctype="multipart/form-data">
                @csrf
                @if(isset($product))
                    @method('PUT')
                @endif
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Product Details</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{ isset($product) ? $product->name : '' }}">
                                    @error('name')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" rows="5" name="description">{{ isset($product) ? $product->description : '' }}</textarea>
                                </div>
                                @error('description')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select class="form-select" name="category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @if (isset($product) && $category->id == $product->category_id) selected @endif>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" id="image" name="images[]" multiple>
                                    @error('images.*')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                @if (isset($product))
                                <div class="row mt-3">
                                    @foreach ($product->images as $image)
                                        <div class="col-md-4 col-sm-6 mb-3">
                                            <div class="card shadow-sm">
                                                <div class="card-body text-center">
                                                    <img src="{{ asset('storage/' . $image->image_url) }}" 
                                                         alt="{{ $product->name }}" 
                                                         class="img-fluid rounded mb-2" 
                                                         style="max-height: 150px; object-fit: cover;">
                                                    <div class="mt-2">
                                                        <input class="" 
                                                               type="checkbox" 
                                                               name="delete_images[]" 
                                                               value="{{ $image->id }}" 
                                                               id="deleteImage{{ $image->id }}">
                                                        <label class="m-0" for="deleteImage{{ $image->id }}">
                                                            Delete
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="text" class="form-control" name="price" value="{{ isset($product) ? $product->price : '' }}"/>
                                    </div>
                                    @error('price')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="price_after_discount">Price After Discount</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="text" class="form-control" name="price_after_discount" value="{{ isset($product) ? $product->price_after_discount : '' }}">
                                    </div>
                                    @error('price_after_discount')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="stock">Stock</label>
                                    <input type="text" class="form-control" name="stock" placeholder="Stock number" value="{{ isset($product) ? $product->stock : '' }}">
                                    @error('stock')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="video">youtube video id</label>
                                    <input type="text" class="form-control" name="video" placeholder="video link" value="{{ isset($product) ? $product->video : '' }}">
                                    @error('video')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a href="{{ route('admin.products') }}" type="button" class="btn btn-danger">Cancel</a>
                      </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
