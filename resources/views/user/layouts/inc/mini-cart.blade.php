<aside class="mini-cart" id="miniCart">
    <div class="mini-cart-wrapper">
        <a href="" class="btn-close"><i class="dl-icon-close"></i></a>
        <div class="mini-cart-inner">
            <h5 class="mini-cart__heading mb--40 mb-lg--30">Shopping Cart</h5>
            @if ($cartItems->isNotEmpty())
            <div class="mini-cart__content">
                <ul class="mini-cart__list mini-cart-items">
                    @foreach ($cartItems as $item)
                    
                    <li class="mini-cart__product" data-product-id="{{$item['product']->id}}">
                        
                        <div class="mini-cart__product__image">
                            @if ($item['product']->images->isNotEmpty())
                                <img src="{{ asset('storage/' . $item['product']->images[0]->image_url) }}" alt="Product Image">
                            @else
                                <img src="{{ asset('storage/images/default_product.png')}}" alt="Product Image">
                            @endif
                        </div>
                        <div class="mini-cart__product__content">
                            <a class="mini-cart__product__title" href="{{route('product-details', $item['product']->id)}}">{{$item['product']->name}} </a>
                            <div class="quantity-controls">
                                <button class="update-cart-quantity btn-decrease" data-product-id="{{ $item['product']->id }}" data-action="decrease">
                                    <i class="{{ $item['quantity'] > 1 ? 'fa-solid fa-minus' : 'fa-solid fa-trash' }}"></i>
                                </button>
                                <input type="number" class="mini-cart-quantity" data-product-id="{{ $item['product']->id }}" value="{{ $item['quantity'] }}" readonly>
                                <button class="update-cart-quantity btn-increase" data-product-id="{{ $item['product']->id }}" data-action="increase">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </div>
                            

                        </div>
                    </li>
                    @endforeach
                </ul>
                <div class="mini-cart__total cart-total">
                    <span>Subtotal</span>
                    <span class="ammount" id="cart-total">${{$total ?? 0}}</span>
                </div>
                <div class="mini-cart__buttons">
                    <a href="{{route('cart.view')}}" class="btn btn-fullwidth btn-style-1">View Cart</a>
                    <a href="{{route('checkout')}}" class="btn btn-fullwidth btn-style-1">Checkout</a>
                </div>
            </div>
            @else
            <div class="row text-center gap-5">
                <svg id="icon-cart-emty" widht="50" height="50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M263.4 103.4C269.7 97.18 279.8 97.18 286.1 103.4L320 137.4L353.9 103.4C360.2 97.18 370.3 97.18 376.6 103.4C382.8 109.7 382.8 119.8 376.6 126.1L342.6 160L376.6 193.9C382.8 200.2 382.8 210.3 376.6 216.6C370.3 222.8 360.2 222.8 353.9 216.6L320 182.6L286.1 216.6C279.8 222.8 269.7 222.8 263.4 216.6C257.2 210.3 257.2 200.2 263.4 193.9L297.4 160L263.4 126.1C257.2 119.8 257.2 109.7 263.4 103.4zM80 0C87.47 0 93.95 5.17 95.6 12.45L100 32H541.8C562.1 32 578.3 52.25 572.6 72.66L518.6 264.7C514.7 278.5 502.1 288 487.8 288H158.2L172.8 352H496C504.8 352 512 359.2 512 368C512 376.8 504.8 384 496 384H160C152.5 384 146.1 378.8 144.4 371.5L67.23 32H16C7.164 32 0 24.84 0 16C0 7.164 7.164 0 16 0H80zM107.3 64L150.1 256H487.8L541.8 64H107.3zM128 456C128 425.1 153.1 400 184 400C214.9 400 240 425.1 240 456C240 486.9 214.9 512 184 512C153.1 512 128 486.9 128 456zM184 480C197.3 480 208 469.3 208 456C208 442.7 197.3 432 184 432C170.7 432 160 442.7 160 456C160 469.3 170.7 480 184 480zM512 456C512 486.9 486.9 512 456 512C425.1 512 400 486.9 400 456C400 425.1 425.1 400 456 400C486.9 400 512 425.1 512 456zM456 432C442.7 432 432 442.7 432 456C432 469.3 442.7 480 456 480C469.3 480 480 469.3 480 456C480 442.7 469.3 432 456 432z"></path></svg>
                <h1 class="text-center">Your cart is empty</h1>
                <div class="mini-cart__buttons">
                    <a href="{{route('shop-sidebar')}}" class="btn btn-fullwidth btn-style-1">shop page</a>
                    
                </div>
            </div>
            
            @endif
            
        </div>
    </div>
</aside>