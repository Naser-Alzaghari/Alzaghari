<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\CartController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\CouponController;
use App\Http\Controllers\admin\ReviewController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\user\CheckoutController;

use App\Http\Controllers\user\WishlistController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\user\LandingPageController;
use App\Http\Controllers\user\ShopSidebarController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\Auth\AdminAuthenticatedSessionController;
use App\Http\Controllers\user\ProductController as UserProductController;
use App\Http\Controllers\admin\ProductController as AdminProductController;

// use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {

        // Admin Authentication Routes
        Route::get('/login', [AdminAuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('/login', [AdminAuthenticatedSessionController::class, 'store']);
        Route::post('/logout', [AdminAuthenticatedSessionController::class, 'destroy'])->name('logout');

        // Protected Admin Routes (requires admin authentication)
        Route::middleware(['isAdmin'])->group(function () {

            // Dashboard
            Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
            Route::get('/api/sales', [DashboardController::class, 'getMonthlySales'])->name('api.sales');

            // Profile Management
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

            // Orders Management
            Route::get('/orders/view', function () {
                return view('admin/orders');
            })->name('orders.view');
            Route::resource('orders', OrderController::class)->except(['create', 'store'])->name('index', 'orders');

            // Coupons Management
            Route::resource('coupons', CouponController::class)->name('index', 'coupons');
            Route::patch('/coupons/{coupon}/toggle', [CouponController::class, 'toggle'])->name('coupons.toggle');

            // Users Management
            Route::resource('users', UserController::class)->name('index', 'users');
            Route::post('/users/{id}/restore', [UserController::class, 'restore'])->name('users.restore');

            // Products Management
            Route::resource('products', AdminProductController::class)->name('index', 'products');
            Route::get('/products/{id}/add-stock-form', [AdminProductController::class, 'addStockForm'])->name('products.addStockForm');
            Route::put('/products/{id}/add-stock', [AdminProductController::class, 'addStock'])->name('products.addStock');

            // Reviews Management
            Route::resource('reviews', ReviewController::class)->name('index', 'reviews');
            Route::get('/reviews/{review}/toggle', [ReviewController::class, 'toggle'])->name('reviews.toggle');

            // Categories Management
            Route::resource('categories', CategoryController::class)->name('index', 'categories');
        });
    });








    Route::prefix('')
    ->group(function () {
            Route::post('/shop-sidebar', [ShopSidebarController::class, 'search_product'])->name('search_product');
            Route::get('/', [LandingPageController::class, 'index'])->name('landing_page');

            Route::get('/master', function () {
                return view('user/master');
            });
            
            Route::get('/wishlist', function () {
                return view('user/wishlist');
            })->name('wishlist');
            
            Route::get('/contact-us', function () {
                return view('user/contact-us');
            })->name('contact-us');
            
            
            Route::get('/about-us', function () {
                return view('user/about-us');
            })->name('about-us');
            Route::get('/blog-masonary', function () {
                return view('user/blog-masonary');
            })->name('blog-masonary');
            Route::get('/blog-no-sidebar', function () {
                return view('user/blog-no-sidebar');
            });
            Route::get('/blog-standard', function () {
                return view('user/blog-standard');
            });
            Route::get('/blog', function () {
                return view('user/blog');
            })->name('blog');
            // Route::get('/cart', function () {
            //     return view('user/cart');
            // })->name('cart');
            // Route::get('/checkout', function () {
            //     return view('user/checkout');
            // })->name('checkout');
            Route::get('/coming-soon', function () {
                return view('user/coming-soon');
            })->name('coming-soon');
            Route::get('/compare', function () {
                return view('user/compare');
            })->name('compare');
            Route::get('/contact-us', function () {
                return view('user/contact-us');
            })->name('contact-us');
            Route::get('/faqs-page', function () {
                return view('user/faqs-page');
            })->name('faqs-page');
            Route::get('/login-register', function () {
                return view('user/login-register');
            });
            Route::get('/my-account', function () {
                return view('user/my-account');
            })->name('my-account');
            
            Route::get('/order-tracking', function () {
                return view('user/order-tracking');
            })->name('order-tracking');
            Route::get('/product-details-02', function () {
                return view('user/product-details-02');
            });
            Route::get('/product-details-affiliate', function () {
                return view('user/product-details-affiliate');
            });
            Route::get('/product-details-configurable', function () {
                return view('user/product-details-configurable');
            });
            Route::get('/product-details-gallery', function () {
                return view('user/product-details-gallery');
            });
            Route::get('/product-details-grouped', function () {
                return view('user/product-details-grouped');
            });
            Route::get('/product-details-sidebar', function () {
                return view('user/product-details-sidebar');
            });
            Route::get('/product-details-sticky', function () {
                return view('user/product-details-sticky');
            });
            // routes/web.php
            Route::get('/product/{id}', [UserProductController::class, 'show'])->name('product-details');
            // Route::get('/product-details', function () {
            //     return view('user/product-details');
            // })->name('product-details');
            Route::get('/shop-collections', function () {
                return view('user/shop-collections');
            });
            Route::get('/shop-fullwidth', function () {
                return view('user/shop-fullwidth');
            });
            Route::get('/shop-instagram', function () {
                return view('user/shop-instagram');
            });
            Route::get('/shop-list', function () {
                return view('user/shop-list');
            });
            Route::get('/shop-no-gutter', function () {
                return view('user/shop-no-gutter');
            });
            Route::get('/shop-sidebar', [ShopSidebarController::class, 'index'])->name('shop-sidebar');
            Route::get('/shop/category/{id}', [ShopSidebarController::class, 'filterByCategory'])->name('shop.filterByCategory');
            Route::get('/shop-three-column', function () {
                return view('user/shop-three-column');
            })->name('shop-three-column');
            Route::get('/shop-two-column', function () {
                return view('user/shop-two-column');
            })->name('shop-two-column');
            Route::get('/single-post-sidebar', function () {
                return view('user/single-post-sidebar');
            })->name('single-post-sidebar');
            Route::get('/single-post', function () {
                return view('user/single-post');
            })->name('single-post');
            Route::get('/team', function () {
                return view('user/team');
            })->name('team');
            Route::get('/welcome', function () {
                return view('user/welcome');
            })->name('welcome');
            // routes/web.php

            Route::middleware(['auth'])->group(function () {
                Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
                Route::post('/wishlist/add', [WishlistController::class, 'store'])->name('wishlist.store');
                Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
                Route::post('/wishlist/toggle', [WishlistController::class, 'toggle'])->name('wishlist.toggle');

            });

            Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
            Route::post('/update-cart-quantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
            Route::post('/update-cart-total', [CartController::class, 'updateTotal'])->name('cart.updateTotal');
            Route::post('/remove-cart-item', [CartController::class, 'removeItem'])->name('cart.removeItem');
            Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
            // Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout')->middleware('auth');
            Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('order.place')->middleware('auth');
            Route::get('/product-data', [UserProductController::class, 'getProductData'])->name('getProductData');
            Route::get('/minicartprice', [CartController::class, 'updateCart'])->name('minicartprice');
            Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout')->middleware('auth');
            Route::post('/placeOrder', [CheckoutController::class, 'placeOrder'])->name('place_order');


            
        
    });

    
    
    

































    // Route::get('/categories', function () {
//     return view('admin/categories');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/products', function () {
//     return view('admin/products');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/reviews', function () {
//     return view('admin/reviews');
// })->middleware(['auth', 'verified'])->name('dashboard');



// Route::get('/profile', function () {
//     return view('profile/edit');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/users', function () {
//     return view('admin/users/index');
// })->middleware(['auth', 'verified'])->name('dashboard');



// Route::get('/orders', function () {
//     return view('admin/orders');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/orders', function () {
//     return view('admin/orders');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
