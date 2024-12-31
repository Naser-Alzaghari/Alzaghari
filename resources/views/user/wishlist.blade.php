@extends('user.layouts.master')

@section('content')

<style>
    /* Responsive wishlist table styles */
    .wishlist-table th:last-child,
.wishlist-table td.product-action-btn {
    width: 120px;
    white-space: nowrap;
}
@media screen and (max-width: 767px) {
    .wishlist-table {
        display: block;
        width: 100%;
    }

    .wishlist-table thead {
        display: none;
    }

    .wishlist-table tbody {
        display: block;
        width: 100%;
    }

    .wishlist-table tbody tr {
        display: block;
        margin-bottom: 1.5rem;
        padding: 1rem;
        border: 1px solid #dee2e6;
        border-radius: 0.25rem;
        position: relative;
    }

    .wishlist-table tbody td,
    .wishlist-table tbody th {
        display: block;
        padding: 0.5rem 0;
        border: none;
    }

    /* Hide empty th */
    .wishlist-table tbody tr > th:first-child {
        display: none;
    }

    /* Product thumbnail styling */
    .wishlist-table td.product-thumbnail {
        text-align: center;
        padding: 1rem 0;
    }

    .wishlist-table td.product-thumbnail img {
        max-width: 150px;
        margin: 0 auto;
    }

    /* Product name styling */
    .wishlist-table td.product-name {
        padding: 0.5rem 0;
    }

    .wishlist-table td.product-name h3 {
        font-size: 1.1rem;
        margin-bottom: 0.5rem;
    }

    /* Add labels for mobile view */
    .wishlist-table td.product-stock:before {
        content: "Stock Status: ";
        font-weight: 600;
    }

    .wishlist-table td.product-price:before {
        content: "Price: ";
        font-weight: 600;
    }

    /* Action buttons styling */
    .wishlist-table td.product-action-btn {
        display: flex;
        justify-content: center;
        gap: 1rem;
        padding-top: 1rem;
        margin-top: 0.5rem;
        border-top: 1px solid #dee2e6;
    }

    .wishlist-table th:last-child,
.wishlist-table td.product-action-btn {
    width: auto;
    white-space: nowrap;
}
    
}

/* Desktop styles */
.wishlist-table .action-btn {
    border-radius: 50%;
   
    display: inline-flex;
    align-items: center;
    justify-content: center;
}


/* Action column width control */


/* Ensure price column doesn't expand unnecessarily */
.wishlist-table td.product-price {
    white-space: nowrap;
    width: min-content;
}
</style>
<div id="content" class="main-content-wrapper">
    <div class="page-content-inner">
        <div class="container">
            <div class="row pt--150 pt-md--60 pt-sm--40 pb--65 pb-md--45 pb-sm--25">
                <h1 class="mb-3"><b>Wishlist</b></h1>
                <div class="col-12" id="main-content">
                    <div class="table-content table-responsive">
                        @if ($wishlistItems->isNotEmpty())
                        <table class="table table-style-2 wishlist-table">
                            <thead>
                                <tr>
                                    <th class="px-2">&nbsp;</th>
                                    <th class="px-2">&nbsp;</th>
                                    <th class="px-2" class="text-start">Product</th>
                                    <th class="px-2">Stock Status</th>
                                    <th class="px-2">Price</th>
                                    <th class="px-2" style="width: min-content">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wishlistItems as $item)
                                <tr>
                                    <th class="px-2">&nbsp;</th>
                                    <td class="px-2 product-thumbnail">
                                        @if ($item['product']->images->isNotEmpty())
                                            <img class="rounded" src="{{ asset('storage/' . $item['product']->images[0]->image_url) }}" alt="Product Thumbnail">
                                        @else
                                            <img class="rounded" src="{{ asset('storage/images/default_product.png')}}" alt="Product Thumbnail">
                                        @endif
                                    </td>
                                    <td class="px-2 product-name">
                                        <h3>
                                            <a href="{{ route('product-details', $item['product']->id)  }}">{{$item['product']->name}}</a>
                                        </h3>
                                    </td>
                                    <td class="px-2 product-stock">
                                        {{$item['product']->stock > 0 ? 'In Stock' : 'Sold Out'}}
                                    </td>
                                    <td class="px-2 product-price" style="width: max-content">
                                        <span class="product-price-wrapper">
                                            <span class="money">${{$item['product']->price_after_discount ?? $item['product']->price}}</span>
                                        </span>
                                    </td>
                                    <td class="px-2 product-action-btn">
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
                        @else
                            <div class="text-center">
                                <h1 class="text-center p-4">Your Wishlist is empty</h1>
                                <a href="{{route('landing_page')}}" class="btn btn-color-gray btn-medium btn-bordered btn-style-1">Back to home</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
