<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\EmailMessagesController;

use App\Http\Controllers\AdminMail;









use Gloudemans\Shoppingcart\Facades\Cart;



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

//shop routes

Route::get('/', [ProductController::class, 'welcome'])
    ->name('welcome')
    ->withoutMiddleware('auth');



Route::get('products', [ProductController::class, 'index'])
    ->name('products.index');

Route::get('details/{id}', [ProductController::class, 'show'])
    ->withoutMiddleware('auth');



//products



Route::get('recherche', [ProductController::class, 'recherche'])
    ->name('products.recherche')
    ->withoutMiddleware('auth');


//cart

Route::post('/panier/ajouter' , [CartController::class, 'store'])
    ->name('cart.store')
    ->withoutMiddleware('auth');

Route::get('/panier', [CartController::class, 'index'])
->name('cart.index')
->withoutMiddleware('auth');

Route::get('/videpanier', function() {
    Cart::destroy();
});

Route::delete('/panier/{rowId}', [CartController::class, 'destroy'])
    ->name('cart.destroy')
    ->withoutMiddleware('auth');

Route::patch('/panier/{rowId}', [CartController::class, 'update'])
    ->name('cart.update')
    ->withoutMiddleware('auth');

//checkout

Route::get('/payment', [CheckoutController::class, 'index'])
    ->name('checkout.index')
    ->withoutMiddleware('auth');

Route::post('/option', [CheckoutController::class, 'store'])
    ->name('order.option')
    ->withoutMiddleware('auth');

//payment

Route::get('/payment/create', [PaymentController::class, 'create'])
    ->name('payment.create')
    ->withoutMiddleware('auth');


Route::post('/payment/store', [PaymentController::class, 'store'])
    ->name('payment.store')
    ->withoutMiddleware('auth');


//order



Route::get('/order/create', [OrderController::class, 'index'])
    ->name('order')
    ->withoutMiddleware('auth');

Route::get('/order/create', [OrderController::class, 'create'])
    ->name('order.create')
    ->withoutMiddleware('auth');


Route::post('/order/store', [OrderController::class, 'store'])
    ->name('order.store')
    ->withoutMiddleware('auth');


Route::get('commande/{order_id}', [OrderController::class, 'show'])
    ->name('order.confirm')
    ->withoutMiddleware('auth');


Route::post('valider/', [OrderController::class, 'valideOrder'])
    ->name('order.valide')
    ->withoutMiddleware('auth');

Route::get('annuler/{order_id}', [OrderController::class, 'destroy'])
    ->name('order.annuler')
    ->withoutMiddleware('auth');



Route::get('/test', function () {
        return view('checkout.test');
     });


//Newsletter


Route::get('newsletter/subscribe', [NewsletterController::class, 'index'])
    ->withoutMiddleware('auth');


Route::post('newsletter/store', [NewsletterController::class, 'storeEmail'])
    ->name('newsletter.store')
    ->withoutMiddleware('auth');




Route::get('admin/mail', [AdminMail::class, 'index'])
    ->withoutMiddleware('auth');

Route::post('admin/mail', [AdminMail::class, 'sendMail'])
    ->name('sendMail')
    ->withoutMiddleware('auth');






require __DIR__.'/auth.php';


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
