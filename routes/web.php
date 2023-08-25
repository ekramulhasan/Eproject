<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\Coupon;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Models\Testimonial;

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



// Route::get('/', function () {
//     return view('frontend.pages.home');
// });


Route::prefix('')->group(function(){


    Route::get('/', [HomeController::class,'home'])->name('home');
    Route::get('shop',[HomeController::class, 'shopePage'])->name('shop.page');
    Route::get('/single-product/{product_slug}',[HomeController::class,'productDetails'])->name('productDetails.page');
    Route::get('/cart-page',[CartController::class,'cartPage'])->name('cart.page');
    Route::post('addTocart/{product_slug}',[CartController::class,'addTocart'])->name('addTo.cart');
    Route::get('remove-item/{cart_id}',[CartController::class,'removeFromcart'])->name('remove_item');

});


// auth for admin
Route::prefix('admin/')->group(function(){

    Route::get('/login', [LoginController::class,'loginPage'])->name('admin.loginpage');
    Route::post('/loginuser', [LoginController::class,'loginUser'])->name('admin.loginuser');
    Route::get('/logout', [LoginController::class,'logout'])->name('admin.logout');


    Route::middleware(['auth'])->group(function () {

        Route::get('/dashbord',[DashbordController::class,'dashbord'])->name('admin.dashbord');
        // Route::get('/category',[DashbordController::class,'dashbord'])->name('admin.dashbord');

    });


    //Category Resource
    Route::resource('category',CategoryController::class);
    Route::resource('testimonial',TestimonialController::class);
    Route::resource('products',ProductController::class);
    Route::resource('coupon', CouponController::class);
});





