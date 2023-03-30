<?php



use App\Http\Controllers\PayPalController;
use App\Http\Livewire\Shop\Cart\IndexComponent as CartIndexComponent;
use App\Http\Livewire\Shop\CheckoutComponent;
use App\Http\Livewire\Shop\IndexComponent;
use App\Http\Livewire\Shop\SingleProduct;

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

//Ruta de la tienda
Route::get('/', IndexComponent::class)->name('shop.index');

//Publicaciones /articulos
Route::get('products/{product}', SingleProduct::class)->name('publicaciones.show');

Route::middleware(['auth:sanctum', 'verified'])->get('/cart', function(){
    return view('home');
});


Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['cart.is.empty'])->group(function(){
    //Ruta del carrito
    Route::get('/cart', CartIndexComponent::class)->name('cart');
    //Ruta Pagar
    Route::get('/checkout', CheckoutComponent::class)->name('checkout');
    //Pagos Paypal
    Route::get('/paypal/checkout{order}', [PayPalController::class, 'getExpressCheckout'])->name('paypal.checkout');
    Route::get('/paypal-success/{order}', [PayPalController::class, 'getExpressCheckoutSuccess'])->name('paypal.success');
    Route::get('/paypal-cancel', [PayPalController::class, 'cancelPage'])->name('paypal.cancel');

});



//filtrar por categorias y etiquetas
Route::get('category/{category}', [SingleProduct::class, 'category'])->name('products.category');
Route::get('tags/{tag}', [SingleProduct::class, 'tag'])->name('products.tag');


//Comment System

Route::post('comments', [App\Http\Controllers\CommentController::class, 'store']);