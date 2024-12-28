
    <div class="airi-product">
        <div class="product-inner">
            <figure class="product-image">
                <div class="
                product-image--holder
                ">
                
                <a href="{{ route('product-details', $product->id)  }}" class="d-flex flex-column justify-content-center align-items-center">
                    @if ($product->images->isNotEmpty())
                        <img src="{{ asset('storage/' . $product->images[0]->image_url) }}" alt="Product Image" class="primary-image">
                        <div class="custom-style" style="background-image: url('{{ asset('storage/' . $product->images[0]->image_url) }}');"></div>
                        @if ($product->images->count() > 1)
                            <img src="{{ asset('storage/' . $product->images[1]->image_url) }}" alt="Product Image" class="secondary-image">
                        @else
                            <img src="{{ asset('storage/' . $product->images[0]->image_url) }}" alt="Product Image" class="secondary-image">
                        @endif
                    @else
                        <img src="{{ asset('storage/images/default_product.png')}}" alt="Product Image" class="primary-image">
                        <img src="{{ asset('storage/images/default_product.png')}}" alt="Product Image" class="secondary-image">
                    @endif
                    
                </a>                
                </div>
                <div class="airi-product-action">
                    <div class="product-action">
                        <a class="quickview-btn action-btn" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick Shop">
                            <span data-bs-toggle="modal" data-bs-target="#productModal" data-product-id="{{ $product->id }}">
                              <i class="dl-icon-view"></i>
                            </span>
                          </a>
                          
                        
                        <a href="#" class="add_to_cart_btn action-btn" data-product-name="{{$product->name}}" data-product-id="{{ $product->id }}" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Cart">
                            <i class="dl-icon-cart29"></i>
                        </a>
                        
                        
                        
                        @auth
                        <a class="add_wishlist action-btn {{ $product->isInWishlist(auth()->id()) ? 'active' : '' }}" 
                            href="javascript:void(0);" 
                            data-product-id="{{ $product->id }}" 
                            data-bs-toggle="tooltip" 
                            data-bs-placement="left" 
                            title="Add to Wishlist">
                            <i class="dl-icon-heart"></i>
                        </a>
                        @endauth
                        
                        
                    </div>
                </div>
                @if (isset($product->price_after_discount))
                    <span class="product-badge sale">Sale</span>
                @endif


                
            </figure>
            <div class="product-info">
                <h3 class="product-title">
                    <a href="{{ route('product-details', $product->id)  }}">{{$product->name}}</a>
                </h3>
                @if (number_format($product->averageRating()) != 0)
                <div class="product-rating">
                    <span>
                        @for ($i = 0; $i < number_format($product->averageRating()); $i++)
                            <i class="dl-icon-star rated"></i>
                        @endfor
                        @for ($i = number_format($product->averageRating()); $i < 5; $i++)
                            <i class="dl-icon-star"></i>
                        @endfor
                    </span>
                    <span class="inline-block ms-4">
                        {{$product->ratingsCount()}} ratings
                    </span>
                </div>  
                @endif
                
                <span class="product-price-wrapper">
                    @if (isset($product->price_after_discount))
                    <span class="money">{{$product->price_after_discount}}JD</span>
                    <span class="product-price-old">
                        <span class="money">{{$product->price}}JD</span>
                    </span>
                    @else
                    <span class="money">{{$product->price}}JD</span>
                    @endif 
                </span>
            </div>
        </div>
    </div>


    

