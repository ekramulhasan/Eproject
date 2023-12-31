<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\Coupon;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\Frontend\Auth\CustomerController;
use App\Http\Controllers\Backend\CustomerController as CustomerData;
use App\Http\Controllers\customerProfile;
use App\Http\Controllers\Frontend\Auth\RegisterController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckOutController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Models\Order;
use App\Models\Product;
use App\Models\Testimonial;
use Whoops\Run;

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

    // about
    Route::get('/about-us',function(){

        return view('frontend.pages.widgets.aboutUs');

    })->name('about-us');

    // FAQ
    Route::get('/faq',function(){

        return view('frontend.pages.widgets.faq');

    })->name('faq');

    // contract
    Route::get('/contract',function(){

        return view('frontend.pages.widgets.contract');

    })->name('contract');

    //check mail
    Route::get('email',function(){

        $order = Order::whereId(1)->with('billing','orderDetails')->get();
        return view('frontend.mail.purchase_confirm',['order_details' => $order]);

    });


    // register page
    Route::get('register',[RegisterController::class,'registerPage'])->name('register.page');
    Route::post('register',[RegisterController::class,'userStore'])->name('user.store');
    Route::get('login',[RegisterController::class,'loginPage'])->name('login.page');
    Route::post('login',[RegisterController::class,'loginStore'])->name('login.store');

    //ajax call
    Route::get('/upazila/ajax/{district_id}',[CheckOutController::class,'loadAjax'])->name('load.ajax');

    //customer auth
    Route::prefix('customer/')->middleware('auth','is_customer')->group(function(){

        Route::get('dashboard',[CustomerController::class,'dashboard'])->name('dashboard.page');
        Route::get('logout',[RegisterController::class,'logOut'])->name('logout');

        //customer profile
        Route::get('/profile-edit/{id}',[customerProfile::class,'profile_edit'])->name('profile-edit');
        Route::put('/profile-update/{id}',[customerProfile::class,'update'])->name('profile-update');

        // coupon apply and remove
        Route::post('cart/coupon-apply',[CartController::class,'couponApply'])->name('coupon.apply');
        Route::get('cart/coupon-remove/{coupon_name}',[CartController::class,'couponRemove'])->name('coupon.remove');

        //customer checkout
        Route::get('checkout',[CheckOutController::class,'checkoutPage'])->name('cutomer.checkout');
        Route::post('placeOrder',[CheckOutController::class,'placeOrder'])->name('place.order');

    });

});


// auth for admin
Route::prefix('admin/')->group(function(){

    Route::get('/login', [LoginController::class,'loginPage'])->name('admin.loginpage');
    Route::post('/loginuser', [LoginController::class,'loginUser'])->name('admin.loginuser');
    Route::get('/logout', [LoginController::class,'logout'])->name('admin.logout');


    Route::middleware(['auth','is_admin'])->group(function () {

        Route::get('/dashbord',[DashbordController::class,'dashbord'])->name('admin.dashbord');
        // Route::get('/category',[DashbordController::class,'dashbord'])->name('admin.dashbord');

        //order and customer index
        Route::get('order',[OrderController::class,'index'])->name('order.data');
        Route::get('customer',[CustomerData::class,'index'])->name('customer.data');
        Route::get('customer-edit/{id}',[CustomerData::class,'edit'])->name('customer.edit');
        Route::post('customer-update/{id}',[CustomerData::class,'update'])->name('customer.update');
        Route::delete('customer-delete/{id}',[CustomerData::class,'delete'])->name('customer.delete');



     //Category Resource
    Route::resource('category',CategoryController::class);
    Route::resource('testimonial',TestimonialController::class);
    Route::resource('products',ProductController::class);
    Route::resource('coupon', CouponController::class);



    });



});





