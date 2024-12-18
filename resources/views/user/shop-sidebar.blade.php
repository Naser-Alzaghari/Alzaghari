@extends('user.layouts.master')


@section('content')
    

    <!-- Main Content Wrapper Start -->
    <div id="content" class="main-content-wrapper">
        <div class="page-content-inner enable-page-sidebar">
            <div class="container-fluid">
                <div class="row shop-sidebar pt--150 pt-md--35 pt-sm--20 pb--60 pb-md--50 pb-sm--40">
                    <div class="col-lg-9 order-lg-2" id="main-content">
                        <div class="shop-toolbar">
                            <div class="shop-toolbar__inner">
                                <div class="row ">
                                    {{-- <div class="col-md-6 text-md-start text-center mb-sm--20">
                                        <div class="shop-toolbar__left">
                                            <p class="product-pages">Showing 1–20 of 42 results</p>
                                            <div class="product-view-count">
                                                <p>Show</p>
                                                <ul>
                                                    <li><a href="shop-sidebar.html">6</a></li>
                                                    <li class="active"><a href="shop-sidebar.html">12</a></li>
                                                    <li><a href="shop-sidebar.html">15</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col-12">
                                        <div class="shop-toolbar__right">
                                            {{-- <a href="#" class="product-filter-btn shop-toolbar__btn">
                                                <span>Filters</span>
                                                <i></i>
                                            </a> --}}
                                            <div class="shop-toolbar">
                                                <div class="product-ordering">
                                                    <a href="#" class="product-ordering__btn shop-toolbar__btn">
                                                        <span>Sort By</span>
                                                        <i></i>
                                                    </a>
                                                    <ul class="product-ordering__list">
                                                        <li class="{{ request('sort') == 'rating' ? 'active' : '' }}">
                                                            <a href="?sort=rating">Sort by average rating</a>
                                                        </li>
                                                        <li class="{{ request('sort') == 'newness' ? 'active' : '' }}">
                                                            <a href="?sort=newness">Sort by newness</a>
                                                        </li>
                                                        <li class="{{ request('sort') == 'price_low_high' ? 'active' : '' }}">
                                                            <a href="?sort=price_low_high">Sort by price: low to high</a>
                                                        </li>
                                                        <li class="{{ request('sort') == 'price_high_low' ? 'active' : '' }}">
                                                            <a href="?sort=price_high_low">Sort by price: high to low</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="shop-products">
                            <div class="row grid-space-20 xxl-block-grid-4">
                                @foreach ($products as $product)
                            <div class="col-lg-4 col-sm-6 mb--40 mb-md--30">
                                @include('user.layouts.inc.product-card')
                            </div>
                            @endforeach
                                
                            </div>
                        </div>
                        <nav class="pagination-wrap">
                            <ul class="pagination">
                                <!-- Previous Page Link -->
                                @if ($products->onFirstPage())
                                    <li><span class="prev page-number disabled"><i class="fa fa-angle-double-left"></i></span></li>
                                @else
                                    <li><a href="{{ $products->appends(request()->query())->previousPageUrl() }}"><span class="prev page-number"><i class="fa fa-angle-double-left"></i></span></a></li>
                                @endif
                        
                                <!-- Pagination Links -->
                                @foreach ($products->appends(request()->query())->links()->elements as $element)
                                    @if (is_string($element))
                                        <li class="disabled"><span>{{ $element }}</span></li>
                                    @endif
                        
                                    @if (is_array($element))
                                        @foreach ($element as $page => $url)
                                            @if ($page == $products->currentPage())
                                                <li><span class="current page-number">{{ $page }}</span></li>
                                            @else
                                                <li><a href="{{ $url }}"><span class="page-number">{{ $page }}</span></a></li>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                        
                                <!-- Next Page Link -->
                                @if ($products->hasMorePages())
                                    <li><a href="{{ $products->appends(request()->query())->nextPageUrl() }}"><span class="next page-number"><i class="fa fa-angle-double-right"></i></span></a></li>
                                @else
                                    <li><span class="next page-number disabled"><i class="fa fa-angle-double-right"></i></span></li>
                                @endif
                            </ul>
                        </nav>
                        
                    </div>
                    <div class="col-lg-3 order-lg-1 mt--30 mt-md--40" id="primary-sidebar">
                        <div class="sidebar-widget">
                            <!-- Category Widget Start -->
                            <div class="product-widget categroy-widget mb--35 mb-md--30">
                                <h3 class="widget-title">Categories</h3>
                                <ul class="prouduct-categories product-widget__list">
                                    @foreach ($categories as $category)
                                    <li class="{{ isset($currentCategory) && $currentCategory->id == $category->id ? 'active' : '' }}">
                                        <a href="{{ route('shop.filterByCategory', $category->id) }}">
                                            {{ $category->name }}
                                        </a>
                                        <span class="count">({{ $category->products->count() }})</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- Category Widget End -->


                            <!-- Price Filter Widget Start -->
                            <div class="product-widget product-price-widget mb--40 mb-md--35">
                                <h3 class="widget-title">Price</h3>
                                <div class="widget_content">
                                    <form action="{{ route('shop-sidebar') }}" method="GET">
                                        <div id="slider-range"
                                            class="price-slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                            <div class="ui-slider-range ui-widget-header ui-corner-all"
                                                style="left: 16.6667%; width: 79.1667%;">

                                            </div>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all"
                                                tabindex="0" style="left: 16.6667%;">

                                            </span>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all"
                                                tabindex="0" style="left: 95.8333%;">

                                            </span>
                                        </div>
                                        <div class="filter-price">
                                            <div class="filter-price__count">
                                                <div class="filter-price__input-group mb--20">
                                                    <span>Price: </span>
                                                    <input type="text" id="amount" class="amount-range" readonly="">
                                                    <input type="hidden" name="price_range" id="price-range">
                                                </div>
                                                <button type="submit" class="btn btn-style-1 sidebar-btn">
                                                    filter
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Price Filter Widget End -->

                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content Wrapper Start -->


    
@endsection



