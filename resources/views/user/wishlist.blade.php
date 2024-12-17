@extends('user.layouts.master')

@section('content')
<div id="content" class="main-content-wrapper">
    <div class="page-content-inner">
        <div class="container">
            <div class="row pt--150 pt-md--60 pt-sm--40 pb--65 pb-md--45 pb-sm--25">
                <div class="col-12" id="main-content">
                    <div class="table-content table-responsive">
                        <table class="table table-style-2 wishlist-table text-center">
                            <thead>
                                <tr>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th class="text-start">Product</th>
                                    <th>Stock Status</th>
                                    <th>Price</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wishlistItems as $item)
                                <tr>
                                    <th>&nbsp;</th>
                                    <td class="product-thumbnail text-start">
                                            @if ($item['product']->images->isNotEmpty())
                                                <img src="{{ asset('storage/' . $item['product']->images[0]->image_url) }}" alt="Product Thumnail">
                                            @else
                                                <img src="{{ asset('storage/images/default_product.png')}}" alt="Product Thumnail">
                                            @endif
                                    </td>
                                    <td class="product-name text-start wide-column">
                                        <h3>
                                            <a href="{{ route('product-details', $item['product']->id)  }}">{{$item['product']->name}}</a>
                                        </h3>
                                    </td>
                                    <td class="product-stock">
                                        {{$item['product']->stock > 0 ? 'In Stock' : 'Sold Out'}}
                                        
                                    </td>
                                    <td class="product-price">
                                        <span class="product-price-wrapper">
                                            <span class="money">{{$item['product']->price_after_discount ?? $item['product']->price}}</span>
                                        </span>
                                    </td>
                                    <td class="product-action-btn">
                                        <a href="#" class="add_to_cart_btn action-btn" data-product-name="{{$item['product']->name}}" data-product-id="{{ $item['product']->id }}" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Cart">
                                            <i class="dl-icon-cart29"></i>
                                        </a>
                                        <a class="add_wishlist action-btn {{ $item['product']->isInWishlist(auth()->id()) ? 'active' : '' }}" 
                                            href="javascript:void(0);" 
                                            data-product-id="{{ $item['product']->id }}" 
                                            data-bs-toggle="tooltip" 
                                            data-bs-placement="right" 
                                            title="{{ $item['product']->wishlists->isNotEmpty() ? 'Remove from Wishlist' : 'Add to Wishlist' }}">
                                            <i class="dl-icon-heart"></i>
                                            </a>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
