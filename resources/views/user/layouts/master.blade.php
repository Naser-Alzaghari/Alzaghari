<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">
    
    <!-- Favicons -->
    <link rel="shortcut icon" href="user_assets/img/titleLogo.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="user_assets/img/icon.png">

    <!-- Title -->
    <title>Alzaghari - Clean, Minimal eCommerce Bootstrap 5 Template</title>

    <!-- ************************* CSS Files ************************* -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('user_assets/css/bootstrap.css')}}">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{asset('user_assets/css/font-awesome.min.css')}}">

    <!-- dl Icon CSS -->
    <link rel="stylesheet" href="{{asset('user_assets/css/dl-icon.css')}}">

    <!-- All Plugins CSS  -->
    <link rel="stylesheet" href="{{asset('user_assets/css/plugins.css')}}">

    <!-- Revoulation CSS  -->
    <link rel="stylesheet" href="{{asset('user_assets/css/revoulation.css')}}">

    <!-- style CSS -->
    <link rel="stylesheet" href="{{asset('user_assets/css/main.css')}}">

    <!-- modernizr JS
    ============================================ -->
    <script src="{{asset('user_assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>

    <!-- jQuery JS -->
    <script src="{{asset('user_assets/js/vendor/jquery.min.js')}}"></script>
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body>

    <div class="ai-preloader active">
        <div class="ai-preloader-inner h-100 d-flex align-items-center justify-content-center">
            <div class="ai-child ai-bounce1"></div>
            <div class="ai-child ai-bounce2"></div>
            <div class="ai-child ai-bounce3"></div>
        </div>
    </div>

    <!-- Main Wrapper Start -->
    <div class="wrapper enable-header-transparent">
        @include('user.layouts.inc.nav-bar')

        <!-- Main Content Wrapper Start -->
        @yield('content')
        <!-- Main Content Wrapper Start -->


        <!-- Footer Start -->
        @include('user.layouts.inc.footer')
        <!-- Footer End -->

        <!-- Search from Start -->
        <div class="searchform__popup" id="searchForm">
            <a href="#" class="btn-close"><i class="dl-icon-close"></i></a>
            <div class="searchform__body">
                <p>Start typing and press Enter to search</p>
                <form class="searchform" method="GET" action="{{ route('search_product') }}">
                    <input type="text" name="search" id="search" class="searchform__input" placeholder="Search Entire Store..." value="{{ request('search') }}">
                    <button type="submit" class="searchform__submit"><i class="dl-icon-search10"></i></button>
                </form>
                
                
            </div>
        </div>
        <!-- Search from End -->

        <!-- Side Navigation Start -->
        <aside class="side-navigation" id="sideNav">
            <div class="side-navigation-wrapper">
                <a href="" class="btn-close"><i class="dl-icon-close"></i></a>
                <div class="side-navigation-inner">
                    <div class="widget">
                        <ul class="sidenav-menu">
                            <li><a href="about-us.html">About Airi Shop</a></li>
                            <li><a href="about-us.html">Help Center</a></li>
                            <li><a href="shop-collections.html">Portfolio</a></li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="shop-instagram.html">New Look</a></li>
                        </ul>
                    </div>
                    <div class="widget pt--30 pr--20">
                        <div class="text-widget">
                            <p>
                                <img src="{{asset('user_assets/img/others/payments.png')}}" alt="payment">
                            </p>
                            <p>Pellentesque mollis nec orci id tincidunt. Sed mollis risus eu nisi aliquet, sit amet
                                fermentum justo dapibus.</p>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="text-widget">
                            <p>
                                <a href="#">(+612) 2531 5600</a>
                                <a href="mailto:demo@example.com">demo@example.com</a>
                                PO Box 1622 Colins Street West
                            </p>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="text-widget google-map-link">
                            <p>
                                <a href="https://www.google.com/maps" target="_blank">Google Maps</a>
                            </p>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="text-widget">
                            <!-- Social Icons Start Here -->
                            <ul class="social social-small">
                                <li class="social__item">
                                    <a href="https://twitter.com" class="social__link">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="social__item">
                                    <a href="https://plus.google.com" class="social__link">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </li>
                                <li class="social__item">
                                    <a href="https://facebook.com" class="social__link">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="social__item">
                                    <a href="https://youtube.com" class="social__link">
                                        <i class="fa fa-youtube"></i>
                                    </a>
                                </li>
                                <li class="social__item">
                                    <a href="https://instagram.com" class="social__link">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                            <!-- Social Icons End Here -->
                        </div>
                    </div>
                    <div class="widget">
                        <div class="text-widget">
                            <p class="copyright-text">&copy; AIRI 2021 MADE WITH <i class="fa fa-heart"></i> BY HASTHEMES</p>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <!-- Side Navigation End -->

        <!-- Mini Cart Start -->
        @include('user.layouts.inc.mini-cart')
        <!-- Mini Cart End -->

        <!-- Global Overlay Start -->
        <div class="ai-global-overlay"></div>
        <!-- Global Overlay End -->

        <!-- Modal Start -->
<div class="modal fade product-modal" id="productModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="dl-icon-close"></i></span>
          </button>
          <div class="row">
            <div class="col-md-6">
              <div class="airi-element-carousel product-image-carousel nav-vertical-center nav-style-1" data-slick-options='{"slidesToShow": 1, "slidesToScroll": 1, "arrows": true, "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "dl-icon-left" }, "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "dl-icon-right" }}'>
                <!-- Product images will be dynamically updated here -->
                <div class="product-image">
                  <div class="product-image--holder">
                    <a href="#" id="product-modal-link">
                      <img src="" alt="Product Image" class="primary-image" id="product-modal-img">
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="modal-box product-summary">
                <h3 class="product-title mb--15" id="product-modal-title"></h3>
                <span class="product-price-wrapper mb--20">
                  <span class="money" id="product-modal-price"></span>
                  <span class="product-price-old"><span class="money" id="product-modal-old-price"></span></span>
                </span>
                <p class="product-short-description mb--25 mb-md--20" id="product-modal-description"></p>
                <div class="product-action d-flex flex-row align-items-center mb--30 mb-md--20">
                    <div class="quantity quantitybtn">
                        <input type="number" class="quantity-input" name="qty" id="qty" value="1"
                            min="1">
                    </div>
                  <button type="button" id="add_to_cart" class="btn btn-style-1 btn-large add-to-cart add_to_cart_btn">
                    Add To Cart
                    </button>
                    
                </div>
                
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal End -->
  

        <!-- Newsletter Popup Start -->
        <!-- ********************** -->
        <!-- Newsletter Popup End -->

    </div>
    <!-- Main Wrapper End -->


    <!-- ************************* JS Files ************************* -->

    

    <!-- Bootstrap and Popper Bundle JS -->
    <script src="{{asset('user_assets/js/bootstrap.bundle.min.js')}}"></script>

    <!-- All Plugins Js -->
    <script src="{{asset('user_assets/js/plugins.js')}}"></script>

    <!-- Ajax Mail Js -->
    <script src="{{asset('user_assets/js/ajax-mail.js')}}"></script>

    <!-- Main JS -->
    <script src="{{asset('user_assets/js/main.js')}}"></script>

    <!-- REVOLUTION JS FILES -->
    <script src="{{asset('user_assets/js/revoulation/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{asset('user_assets/js/revoulation/jquery.themepunch.revolution.min.js')}}"></script>

    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
    <script src="{{asset('user_assets/js/revoulation/extensions/revolution.extension.actions.min.js')}}"></script>
    <script src="{{asset('user_assets/js/revoulation/extensions/revolution.extension.carousel.min.js')}}"></script>
    <script src="{{asset('user_assets/js/revoulation/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script src="{{asset('user_assets/js/revoulation/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script src="{{asset('user_assets/js/revoulation/extensions/revolution.extension.migration.min.js')}}"></script>
    <script src="{{asset('user_assets/js/revoulation/extensions/revolution.extension.navigation.min.js')}}"></script>
    <script src="{{asset('user_assets/js/revoulation/extensions/revolution.extension.parallax.min.js')}}"></script>
    <script src="{{asset('user_assets/js/revoulation/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script src="{{asset('user_assets/js/revoulation/extensions/revolution.extension.video.min.js')}}"></script>
    <script src="https://kit.fontawesome.com/29bcb0d26a.js" crossorigin="anonymous"></script>
    <!-- REVOLUTION ACTIVE JS FILES -->
    <script src="{{asset('user_assets/js/revoulation.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    
    <script>
$(document).ready(function() {
    updateCartTotal();

    // Add to Cart
    $('.add_to_cart_btn').click(function(e) {
        e.preventDefault();
        var $button = $(this);
        var productId = $button.data('product-id');
        var quantity = $button.siblings('.quantity').find('.quantity-input').val() ?? 1;
        var productName = $button.data('product-name');
        console.log("productId=" + productId);
        console.log("quantity=" + quantity);
        $button.prop('disabled', true);

        $.ajax({
            url: '{{ route('cart.add') }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                product_id: productId,
                quantity: quantity
            },
            success: function(response) {
                showAlert(`${productName ?? 'item'} has been added to cart!`);
                $('#cart-item-count, .mini-cart-count').text(response.cartItemCount);

                // If the cart was empty, rebuild the mini-cart structure
            if ($('.mini-cart__content').length === 0) {
                $('#miniCart .mini-cart-inner').html(`
                    <h5 class="mini-cart__heading mb--40 mb-lg--30">Shopping Cart</h5>
                    <div class="mini-cart__content">
                        <ul class="mini-cart__list mini-cart-items"></ul>
                        <div class="mini-cart__total cart-total">
                            <span>Subtotal</span>
                            <span class="ammount" id="cart-total">$0</span>
                        </div>
                        <div class="mini-cart__buttons">
                            <a href="{{route('cart.view')}}" class="btn btn-fullwidth btn-style-1">View Cart</a>
                            <a href="{{route('checkout')}}" class="btn btn-fullwidth btn-style-1">Checkout</a>
                        </div>
                    </div>
                `);
            }
                updateMiniCart(response.product, response.quantity);
            },
            error: function() {
                alert('Failed to add product to cart.');
            },
            complete: function() {
                $button.prop('disabled', false);
            }
        });

        updateCartTotal();
    });

    // Update Quantity
    $(document).on('click', '.update-cart-quantity', function(e) {
        e.preventDefault();

        var $button = $(this);
        var productId = $button.data('product-id');
        var action = $button.data('action');

        // Determine if the action is from mini-cart or main cart page
        var $quantityInput = $button.siblings('.mini-cart-quantity').length ? 
                             $button.siblings('.mini-cart-quantity') : 
                             $button.siblings('.quantity-input');

        var quantity = parseInt($quantityInput.val());
        console.log('quantity is ' + quantity);

        if (action === 'increase') quantity++;
        else if (action === 'decrease') quantity--;

        if (quantity <= 0) {
            removeCartItem(productId);
            return;
        }

        $.ajax({
            url: '{{ route('cart.updateQuantity') }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                product_id: productId,
                quantity: quantity
            },
            success: function(response) {
                $quantityInput.val(response.quantity);

                // Fetch the price from the data attribute
                var price = parseFloat($(`tr[data-product-id="${productId}"] .product-price .money`).data('price'));

                // Calculate the new total
                var newTotal = (response.quantity * price).toFixed(0);

                // Update the total in the DOM
                $(`#item-total-${productId}`).html(`<strong>$${newTotal}</strong>`);

                updateCartTotal();
            },
            error: function() {
                alert('Failed to update quantity.');
            }
        });
    });

    // Remove Item
    $(document).on('click', '.remove-cart-item', function(e) {
        e.preventDefault();

        var productId = $(this).data('product-id');
        removeCartItem(productId);
    });

    function updateMiniCart(product, quantity) {
        var miniCart = $('.mini-cart-items');
        var cartItem = miniCart.find(`.mini-cart__product[data-product-id="${product.id}"]`);

        if (cartItem.length) {
            console.log(1111);
            var existingQuantity = parseInt(cartItem.find('.mini-cart-quantity').val());
            var newQuantity = existingQuantity + quantity;
            cartItem.find('.mini-cart-quantity').val(newQuantity);

            console.log(1111);
            
            updateButtonState(cartItem.find('button[data-action="decrease"]'), newQuantity);
        } else {
            miniCart.append(generateCartItemHTML(product, quantity));
        }
    }

    function generateCartItemHTML(product, quantity) {
    return `
        <li class="mini-cart__product" data-product-id="${product.id}">
            <div class="mini-cart__product__image">
                ${product.images && product.images.length 
                    ? `<img src="/storage/${product.images[0].image_url}" alt="Product Image">` 
                    : '<img src="/storage/images/default_product.png" alt="Product Image">'}
            </div>
            <div class="mini-cart__product__content">
                <a class="mini-cart__product__title" href="/product-details/${product.id}">${product.name}</a>
                <div class="quantity-controls">
                    <button class="update-cart-quantity btn-decrease" data-product-id="${product.id}" data-action="decrease">
                        <i class="fa-solid ${quantity > 1 ? 'fa-minus' : 'fa-trash'}"></i>
                    </button>
                    <input type="number" class="mini-cart-quantity" data-product-id="${product.id}" value="${quantity}" readonly>
                    <button class="update-cart-quantity btn-increase" data-product-id="${product.id}" data-action="increase">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </div>
            </div>
        </li>`;
}


function removeCartItem(productId) {
    $.ajax({
        url: '{{ route('cart.removeItem') }}',
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            product_id: productId
        },
        success: function(response) {
            // Remove the item from the cart
            $(`.mini-cart__product[data-product-id="${productId}"]`).remove();
            
            // Update the cart item count
            $('#cart-item-count, .mini-cart-count').text(response.cartItemCount);
            
            // Update the cart total
            updateCartTotal();

            // Check if the cart is empty
            if (response.cartItemCount === 0) {
                // Replace mini-cart content with "Cart is empty" message
                $('.mini-cart-inner').html(`
                    <h5 class="mini-cart__heading mb--40 mb-lg--30">Shopping Cart</h5>
                    <div class="row text-center gap-5">
                <svg id="icon-cart-emty" widht="50" height="50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M263.4 103.4C269.7 97.18 279.8 97.18 286.1 103.4L320 137.4L353.9 103.4C360.2 97.18 370.3 97.18 376.6 103.4C382.8 109.7 382.8 119.8 376.6 126.1L342.6 160L376.6 193.9C382.8 200.2 382.8 210.3 376.6 216.6C370.3 222.8 360.2 222.8 353.9 216.6L320 182.6L286.1 216.6C279.8 222.8 269.7 222.8 263.4 216.6C257.2 210.3 257.2 200.2 263.4 193.9L297.4 160L263.4 126.1C257.2 119.8 257.2 109.7 263.4 103.4zM80 0C87.47 0 93.95 5.17 95.6 12.45L100 32H541.8C562.1 32 578.3 52.25 572.6 72.66L518.6 264.7C514.7 278.5 502.1 288 487.8 288H158.2L172.8 352H496C504.8 352 512 359.2 512 368C512 376.8 504.8 384 496 384H160C152.5 384 146.1 378.8 144.4 371.5L67.23 32H16C7.164 32 0 24.84 0 16C0 7.164 7.164 0 16 0H80zM107.3 64L150.1 256H487.8L541.8 64H107.3zM128 456C128 425.1 153.1 400 184 400C214.9 400 240 425.1 240 456C240 486.9 214.9 512 184 512C153.1 512 128 486.9 128 456zM184 480C197.3 480 208 469.3 208 456C208 442.7 197.3 432 184 432C170.7 432 160 442.7 160 456C160 469.3 170.7 480 184 480zM512 456C512 486.9 486.9 512 456 512C425.1 512 400 486.9 400 456C400 425.1 425.1 400 456 400C486.9 400 512 425.1 512 456zM456 432C442.7 432 432 442.7 432 456C432 469.3 442.7 480 456 480C469.3 480 480 469.3 480 456C480 442.7 469.3 432 456 432z"></path></svg>
                <h1 class="text-center">Your cart is empty</h1>
                <div class="mini-cart__buttons">
                    <a href="{{route('shop-sidebar')}}" class="btn btn-fullwidth btn-style-1">shop page</a>
                    
                </div>
            </div>
                `);
            }
        },
        error: function() {
            alert('Failed to remove product from cart.');
        }
    });
}


    function updateCartTotal() {
        $.ajax({
            url: '{{ route('cart.updateTotal') }}',
            method: 'POST',
            data: { _token: '{{ csrf_token() }}' },
            success: function(response) {
                $('#cart-subtotal').text('$' + response.total);
                $('#cart-total').text('$' + response.total);
            },
            error: function() {
                alert('Failed to update total.');
            }
        });
    }

    function updateButtonState($button, quantity) {
        var decreaseButton = $button.closest('.quantity-controls').find('button[data-action="decrease"], button[data-action="remove"]');
        if (quantity === 1) {
            decreaseButton.attr('data-action', 'remove').html('<i class="fa-solid fa-trash"></i>');
        } else {
            decreaseButton.attr('data-action', 'decrease').html('<i class="fa-solid fa-minus"></i>');
        }
    }

    function showAlert(message) {
        var alertDiv = $('<div class="alert alert-success"></div>').text(message).hide().fadeIn(500);
        $('body').append(alertDiv);
        setTimeout(() => alertDiv.fadeOut(500, () => alertDiv.remove()), 4000);
    }

    $('#productModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var productId = button.data('product-id');

        $.ajax({
            url: '{{ route('getProductData') }}',
            type: 'GET',
            data: { id: productId },
            success: function(product) {
                $('#product-modal-title').text(product.name);
                $('#product-modal-description').text(product.description);
                $('#product-modal-img').attr('src', 'storage/' + (product.images[0] ?? 'images/default_product.png'));
                $('#product-modal-link').attr('href', product.link);
                $('#product-modal-category').text(product.category).attr('href', product.categoryLink);
                $('#add_to_cart').data('product-id', productId).data('product-name', product.name);
                $('#qty').val(1);

                if (product.price_after_discount) {
                    $('#product-modal-price').html(`${product.price_after_discount}JD`);
                    $('#product-modal-old-price').html(`${product.price}JD`).show();
                } else {
                    $('#product-modal-price').html(`${product.price}JD`);
                    $('#product-modal-old-price').hide();
                }
            },
            error: function() {
                console.error('Error fetching product data.');
            }
        });
    });
    
    $('.add_wishlist').on('click', function (e) {
        e.preventDefault();

        let productId = $(this).data('product-id');
        let button = $(this);

        $.ajax({
            url: '{{ route('wishlist.toggle') }}', // Ensure this matches the route in web.php
            type: 'POST',            // Use POST method
            data: {
                product_id: productId,
                _token: '{{ csrf_token() }}', // Include CSRF token
            },
            success: function (response) {
                if (response.status === 'added') {
                    button.addClass('active'); // Add active class
                    button.attr('title', 'Remove from Wishlist');
                    button.attr('data-bs-original-title', 'Remove from Wishlist');
                } else if (response.status === 'removed') {
                    button.removeClass('active');
                    button.attr('title', 'Add to Wishlist');
                    button.attr('data-bs-original-title', 'Add to Wishlist');
                }
                showAlert(response.message);
                // alert(response.message); // Show success message
            },
            error: function (xhr) {
                alert('Something went wrong! Please try again.');
            }
        });
    });
    
});

$(document).ready(function () {
        // Handle form submission
        $('.payment-form').on('submit', function (event) {
            let isValid = true; // Flag to check form validity
            let errorMessage = ""; // Error message accumulator

            // Clear previous error messages
            $('.form__input').removeClass('is-invalid');
            $('.error-message').remove();

            // Validate Name
            const name = $('#billing_fname').val().trim();
            if (!name) {
                isValid = false;
                errorMessage = "Name is required.";
                showError('#billing_fname', errorMessage);
            }

            // Validate Address
            const address = $('#address').val().trim();
            if (!address) {
                isValid = false;
                errorMessage = "Address is required.";
                showError('#address', errorMessage);
            }

            // Validate Phone Number
            const phoneNumber = $('#phone_number').val().trim();
            const phoneRegex = /^\+?[0-9]{7,15}$/; // Basic international phone number format
            if (!phoneNumber) {
                isValid = false;
                errorMessage = "Phone number is required.";
                showError('#phone_number', errorMessage);
            } else if (!phoneRegex.test(phoneNumber)) {
                isValid = false;
                errorMessage = "Please enter a valid phone number.";
                showError('#phone_number', errorMessage);
            }

            // Validate Payment Method
            const paymentMethod = $('input[name="payment-method"]:checked').val();
            if (!paymentMethod) {
                isValid = false;
                errorMessage = "Please select a payment method.";
                showError('input[name="payment-method"]', errorMessage);
            }

            // Prevent form submission if invalid
            if (!isValid) {
                event.preventDefault();
            }
        });

        // Function to show error messages
        function showError(selector, message) {
            $(selector).addClass('is-invalid'); // Add invalid class to input
            $(selector).after(`<span class="error-message" style="color:red;">${message}</span>`); // Append error message
        }

        
        
    });

    





    </script>
    

    
    
    
</body>

</html>