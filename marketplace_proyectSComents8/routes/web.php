<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\RatingController;
use App\Http\Livewire\Shop\About;
use App\Http\Livewire\Shop\Cart\CartComponent;
use App\Http\Livewire\Shop\CheckoutComponent;
use App\Http\Livewire\Shop\ContactComponent;
use App\Http\Livewire\Shop\IndexComponent;
use App\Http\Livewire\Shop\PoliticasDePrivacidad;
use App\Http\Livewire\Shop\ProducRecentComponent;
use App\Http\Livewire\Shop\ShopComponent;
use App\Http\Livewire\Shop\SingleProduct;
use App\Http\Livewire\Shop\TermsConditions;
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

//Cart route
Route::get('cart', CartComponent::class)->name('cart'); 
Route::post('add-to-single', [CartComponent::class, 'addProductToSingle']);
Route::post('delete-to-cart', [CartComponent::class, 'deleteProduct']);
Route::delete('delete-all', [CartComponent::class, 'deleteAll']);
Route::post('update-cart', [CartComponent::class, 'updateCart']);

Route::middleware(['cart.is.empty'])->group(function(){
    
    
    //Pay Route
    Route::get('checkout', CheckoutComponent::class)->name('checkout');
    Route::post('place-order', [CheckoutComponent::class, 'placeorder'])->name('place.order');

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

//Products news
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
Route::get('terms-conditions', TermsConditions::class);
Route::get('politicas-de-privacidad', PoliticasDePrivacidad::class);
Route::get('contact', ContactComponent::class);

//Shop
Route::get('shop', ShopComponent::class)->name('view.more');

Route::get('/products/{productId}/purchased-users', [ProductController::class, 'showPurchasedUsers'])->name('products.purchased-users');
