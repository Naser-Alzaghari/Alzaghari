<header class="header {{ request()->is('/') ? 'header-transparent' : 'header-fullwidth' }} header-fullwidth header-style-1">
    <div class="header-outer">
        <div class="header-inner fixed-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-5 col-lg-6">
                        <!-- Main Navigation Start Here -->
                        <nav class="main-navigation">
                            <ul class="mainmenu">
                                <li class="mainmenu__item menu-item-has-children megamenu-holder">
                                    <a href="{{route('landing_page')}}" class="mainmenu__link">
                                        <span class="mm-text">Home</span>
                                    </a>
                                    
                                </li>
                                <li class="mainmenu__item menu-item-has-children">
                                    <a href="{{route('shop-sidebar')}}" class="mainmenu__link">
                                        <span class="mm-text">Shop</span>
                                        {{-- <span class="tip">Hot</span> --}}
                                    </a>
                                </li>
                                <li class="mainmenu__item">
                                    <a href="shop-collections.html" class="mainmenu__link">
                                        <span class="mm-text">Collections</span>
                                    </a>
                                </li>
                                <li class="mainmenu__item menu-item-has-children has-children">
                                    <a href="#" class="mainmenu__link">
                                        <span class="mm-text">Pages</span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="{{route('about-us')}}">
                                                <span class="mm-text">About Us</span>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </li>
                                
                                
                            </ul>
                        </nav>
                        <!-- Main Navigation End Here -->
                    </div>
                    <div class="col-lg-2 col-md-3 col-4 text-lg-center">
                        <!-- Logo Start Here -->
                        <a href="{{route('landing_page')}}" class="logo-box">
                            <figure class="logo--normal">
                                <img src="{{asset('user_assets/img/logo/logo.svg')}}" alt="Logo" />
                            </figure>
                            <figure class="logo--transparency">
                                <img src="{{asset('user_assets/img/logo/logo-white.svg')}}" alt="Logo" />
                            </figure>
                        </a>
                        <!-- Logo End Here -->
                    </div>
                    <div class="col-xl-5 col-lg-4 col-md-9 col-8">
                        <!-- Header Toolbar Start Here -->
                        <ul class="header-toolbar text-end">
                            
                            <li class="header-toolbar__item user-info-menu-btn">
                                <a href="#">
                                    <i class="fa fa-user-circle-o"></i>
                                </a>
                                <ul class="user-info-menu">
                                    @guest
                                        <li>
                                            <a href="{{ route('login') }}">Login</a>
                                        </li>
                                    @endguest
                                    @auth
                                    <li>
                                        <a href="{{route('my_account')}}">My Account</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('wishlist') }}">Wishlist</a>
                                    </li>
                                    @endauth
                                    <li>
                                        <a href="{{route('cart.view')}}">Shopping Cart</a>
                                    </li>
                                    <li>
                                        <a href="{{route('checkout')}}">Check Out</a>
                                    </li>
                                    
                                    
                                    
                                </ul>
                            </li>
                            <li class="header-toolbar__item">
                                <a href="#miniCart" class="mini-cart-btn toolbar-btn">
                                    <i class="dl-icon-cart4"></i>
                                    <sup class="mini-cart-count">{{isset($cartItemCount) ? $cartItemCount : 0}}</sup>
                                </a>
                            </li>
                            <li class="header-toolbar__item">
                                <a href="#searchForm" class="search-btn toolbar-btn">
                                    <i class="dl-icon-search1"></i>
                                </a>
                            </li>
                            <li class="header-toolbar__item d-lg-none">
                                <a href="#" class="menu-btn"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-sticky-header-height"></div>
    </div>

</header>
<!-- Header Area End -->

<!-- Mobile Header area Start -->
<header class="header-mobile">
    <div class="header-mobile__outer">
        <div class="header-mobile__inner fixed-header">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-4">
                        <a href="{{route('landing_page')}}" class="logo-box">
                            <figure class="logo--normal">
                                <img src="{{asset('user_assets/img/logo/logo.svg')}}" alt="Logo">
                            </figure>
                        </a>
                    </div>
                    <div class="col-8">
                        <ul class="header-toolbar text-end">
                            <li class="header-toolbar__item user-info-menu-btn">
                                <a href="#">
                                    <i class="fa fa-user-circle-o"></i>
                                </a>
                                <ul class="user-info-menu">
                                    @guest
                                        <li>
                                            <a href="{{ route('login') }}">Login</a>
                                        </li>
                                    @endguest
                                    @auth
                                    <li>
                                        <a href="{{route('view_orders')}}">My Account</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('wishlist') }}">Wishlist</a>
                                    </li>
                                    @endauth
                                    <li>
                                        <a href="{{route('cart.view')}}">Shopping Cart</a>
                                    </li>
                                    <li>
                                        <a href="{{route('checkout')}}">Check Out</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="header-toolbar__item">
                                <a href="#miniCart" class="mini-cart-btn toolbar-btn">
                                    <i class="dl-icon-cart4"></i>
                                    <sup class="mini-cart-count">{{isset($cartItemCount) ? $cartItemCount : 0}}</sup>
                                </a>
                            </li>
                            <li class="header-toolbar__item">
                                <a href="#searchForm" class="search-btn toolbar-btn">
                                    <i class="dl-icon-search1"></i>
                                </a>
                            </li>
                            <li class="header-toolbar__item d-lg-none">
                                <a href="#" class="menu-btn"></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- Mobile Navigation Start Here -->
                        <div class="mobile-navigation dl-menuwrapper" id="dl-menu">
                            <button class="dl-trigger">Open Menu</button>
                            <ul class="dl-menu">
                                <li>
                                    <a href="{{route('landing_page')}}">
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('shop-sidebar')}}">
                                        Shop
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('shop-sidebar')}}">
                                        Collections
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <!-- Mobile Navigation End Here -->
                    </div>
                </div>
            </div>
        </div>
        <div class="mobile-sticky-header-height"></div>
    </div>
</header>