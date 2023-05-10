<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\RatingController;
use App\Http\Livewire\Shop\About;
use App\Http\Livewire\Shop\Cart\IndexComponent as CartIndexComponent;
use App\Http\Livewire\Shop\CheckoutComponent;
use App\Http\Livewire\Shop\ContactComponent;
use App\Http\Livewire\Shop\IndexComponent;
use App\Http\Livewire\Shop\ProducRecentComponent;
use App\Http\Livewire\Shop\ShopComponent;
use App\Http\Livewire\Shop\SingleProduct;
use App\Http\Livewire\Shop\TrendingProduct;
use App\Http\Livewire\Shop\UserConmponent;
use App\Http\Livewire\Shop\WishListComponent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


//Store Route
Route::get('/', IndexComponent::class)->name('shop.index');
Route::get('trending', TrendingProduct::class)->name('shop.trending');

//Publications /articles
Route::get('products/{product}', SingleProduct::class)->name('publicaciones.show');

Route::middleware(['auth:sanctum', 'verified'])->get('/cart', function(){
    return view('home');
});


Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['cart.is.empty'])->group(function(){
    
    //Cart route
    Route::get('/cart', CartIndexComponent::class)->name('cart');

    //Pay Route
    Route::get('/checkout', CheckoutComponent::class)->name('checkout');

    //Payments PayPal
    Route::get('/paypal/checkout{order}', [PayPalController::class, 'getExpressCheckout'])->name('paypal.checkout');
    Route::get('/paypal-success/{order}', [PayPalController::class, 'getExpressCheckoutSuccess'])->name('paypal.success');
    Route::get('/paypal-cancel', [PayPalController::class, 'cancelPage'])->name('paypal.cancel');

});

//Orders System
Route::get('my-orders', [UserConmponent::class, 'render']);
Route::get('view-order/{order}', [UserConmponent::class, 'view']);

//Filter by categories and tags
Route::get('category/{category}', [SingleProduct::class, 'category'])->name('products.category');
Route::get('tags/{tag}', [SingleProduct::class, 'tag'])->name('products.tag');

//Comment System

Route::post('comments', [CommentController::class, 'store']);

//Rating system
Route::post('add-rating' ,[RatingController::class, 'add']);

//Test path
Route::get('recents', ProducRecentComponent::class)->name('shop.recents');

//WishList
Route::get('wishlist',WishListComponent::class);
Route::post('add-to-wishlist', [WishListComponent::class, 'add']);
Route::post('delete-wishlist-item', [WishListComponent::class, 'deleteItem']);

//Browser 
Route::get('product-list', [IndexComponent::class,'productlistAjax']);
Route::post('searchproduct', [IndexComponent::class,'searchProduct']);

//About Us Section
Route::get('about', About::class);

//Contact Section
Route::get('contact', ContactComponent::class);

Route::get('shop', ShopComponent::class)->name('view.more');