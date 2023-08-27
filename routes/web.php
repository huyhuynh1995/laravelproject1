<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\InfoShop;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/',[App\Http\Controllers\Frontend\FrontendController::class,'index']);
Route::get('/collections',[App\Http\Controllers\Frontend\FrontendController::class,'categories']);
Route::get('/collections/{category_slug}',[App\Http\Controllers\Frontend\FrontendController::class,'products_cate']);
Route::get('/collections/{category_slug}/{product_slug}',[App\Http\Controllers\Frontend\FrontendController::class,'productView']);

Route::controller(App\Http\Controllers\Frontend\FrontendController::class)->group(function(){
    Route::get('/new-arrivals','newArrival');
    Route::get('/featured-products','featuredProduct');
    Route::get('search','searchProducts');
});

Route::get('/contact',[App\Http\Controllers\Frontend\InfoShop::class,'contact']);
Route::get('/about-us',[App\Http\Controllers\Frontend\InfoShop::class,'about']);

Route::middleware(['auth'])->group(function(){
    Route::get('wishlist',[App\Http\Controllers\Frontend\WishlistController::class,'index']);
    Route::get('cart',[App\Http\Controllers\Frontend\CartController::class,'index']);
    Route::get('checkout',[App\Http\Controllers\Frontend\CheckoutController::class,'index']);
    Route::get('orders',[App\Http\Controllers\Frontend\OrderController::class,'index']);
    Route::get('order/{orderId}',[App\Http\Controllers\Frontend\OrderController::class,'show']);
    Route::get('profile',[App\Http\Controllers\Frontend\UserController::class,'index']);
    Route::post('profile',[App\Http\Controllers\Frontend\UserController::class,'updateUserDetails']);
    Route::get('change-password',[App\Http\Controllers\Frontend\UserController::class,'changepassword']);
    Route::post('change-password',[App\Http\Controllers\Frontend\UserController::class,'updatepassword']);
});

Route::get('thank-you',[App\Http\Controllers\Frontend\FrontendController::class,'thankyou']);

Route::get('wishlist',[App\Http\Controllers\Frontend\WishlistController::class,'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::get('settings', [App\Http\Controllers\Admin\SettingController::class, 'index']);
    Route::post('settings',[App\Http\Controllers\Admin\SettingController::class, 'store']);

    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function(){
        Route::get('/category','index');
        Route::get('/category/create','create');
        Route::post('/category','store');
        Route::get('/category/{category}/edit','edit');
        Route::put('/category/{category}','update');
        // Route::get('/category/{id}/delete','delete');
    });

    Route::get('/brands', App\Http\Livewire\Admin\Brand\Index::class);

    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function(){
        Route::get('/products','index');
        Route::get('/products/create','create');
        Route::post('/products','store');
        Route::get('/products/{id}/edit','edit');
        Route::put('/products/{id}','update');
        Route::get('/products/{id}/delete','destroy');

        Route::get('/product-image/{id}/delete','destroyImage');
        Route::post('product-color/{prod_color_id}','updateProdColorQty');
        Route::get('product-color/{prod_color_id}/delete','deleteProdColor');
    });

    Route::controller(App\Http\Controllers\Admin\ColorController::class)->group(function(){
        Route::get('/colors','index');
        Route::get('/colors/create','create');
        Route::post('/colors','store');
        Route::get('/colors/{id}/delete','destroy');
        Route::get('/colors/{id}/edit','edit');
    });

    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function(){
        Route::get('/sliders','index');
        Route::get('/sliders/create','create');
        Route::post('/sliders','store');
        Route::get('/sliders/{slider}/edit','edit');
        Route::put('/sliders/{slider}','update');
        Route::get('/sliders/{slider}/delete','destroy');
    });

    Route::controller(App\Http\Controllers\Admin\OrderController::class)->group(function(){
        Route::get('/orders','index');
        Route::get('/order/{orderId}','show');
        Route::put('/order/{orderId}','updateOrderStatus');

        Route::get('/invoice/{orderId}','viewInvoice');
        Route::get('/invoice/{orderId}/generate','generateInvoice');
        Route::get('/invoice/{orderId}/mail','mailInvoice');
    });

    Route::controller(App\Http\Controllers\Admin\UserController::class)->group(function(){
        Route::get('/users','index');
        Route::get('/users/create','create');
        Route::post('/users','store');
        Route::get('/users/{user_id}/edit','edit');
        Route::put('/users/{user_id}/update','update');
        Route::get('/users/{user_id}/delete','delete');
    });
});