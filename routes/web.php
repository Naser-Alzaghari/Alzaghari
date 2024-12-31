<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\user\CartController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\CouponController;
use App\Http\Controllers\admin\ReviewController;
use App\Http\Controllers\admin\ProfileController;

use App\Http\Controllers\user\CheckoutController;
use App\Http\Controllers\user\WishlistController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\user\ContactUsController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\user\LandingPageController;
use App\Http\Controllers\user\ShopSidebarController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\Auth\AdminAuthenticatedSessionController;
use App\Http\Controllers\user\ProductController as UserProductController;
use App\Http\Controllers\user\ProfileController as UserProfileController;
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
            Route::post('/send_mail', [ContactUsController::class, 'sendMail'])->name('send_mail');

            Route::get('/', [LandingPageController::class, 'index'])->name('landing_page');
            Route::get('/shop-sidebara', [ShopSidebarController::class, 'search_product'])->name('search_product');

            Route::get('/contact-us', function () {
                return view('user/contact-us');
            })->name('contact-us');

            Route::get('/about-us', function () {
                return view('user/about-us');
            })->name('about-us');
            
            Route::get('/contact-us', function () {
                return view('user/contact-us');
            })->name('contact-us');
            
            Route::get('/product/{id}', [UserProductController::class, 'show'])->name('product-details');

            Route::get('/shop-sidebar', [ShopSidebarController::class, 'index'])->name('shop-sidebar');
            Route::get('/shop/category/{id}', [ShopSidebarController::class, 'filterByCategory'])->name('shop.filterByCategory');
            

            Route::middleware(['auth'])->group(function () {
            Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
            Route::post('/wishlist/add', [WishlistController::class, 'store'])->name('wishlist.store');
            Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
            Route::post('/wishlist/toggle', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
            // Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('order.place');
            Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
            Route::post('/placeOrder', [CheckoutController::class, 'placeOrder'])->name('place_order');
            Route::get('/view_orders', [UserProfileController::class, 'index'])->name('view_orders');
            Route::get('/view_order/{id}', [UserProfileController::class, 'show'])->name('view_order');
            Route::get('/my_account', function(){return view('user.my-account');})->name('my_account');
            Route::put('/profile/update', [UserProfileController::class, 'update'])->name('profile.update');
            Route::post('paypal', [CheckoutController::class, 'paypal'])->name('paypal');
            Route::get('success', [CheckoutController::class, 'success'])->name('success');
            Route::get('cancel', [CheckoutController::class, 'cancel'])->name('cancel');

            });
            Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
            Route::post('/update-cart-quantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
            Route::post('/update-cart-total', [CartController::class, 'updateTotal'])->name('cart.updateTotal');
            Route::post('/remove-cart-item', [CartController::class, 'removeItem'])->name('cart.removeItem');
            Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
            Route::get('/product-data', [UserProductController::class, 'getProductData'])->name('getProductData');
            Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
            Route::fallback(function(){
                return view('user.404');
            });
    });

    
require __DIR__.'/auth.php';
