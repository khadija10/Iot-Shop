<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

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



//admin

// Route::get('admin/dashboard', function () {
//     return view('/admin/dashboard');
// })->middleware(['auth'])->name('admin.dashboard');

// Route::get('/admin/products', [ProductController::class, 'list'])
// ->name('admin.products.product-list');

// Route::get('admin/add-product', [ProductController::class, 'create'])->name('admin.products.add-product');
// Route::post('/ajout', [ProductController::class, 'store'])->name('ajoutProd');

//     //cate    
// Route::get('admin/add-category', [CategoryController::class, 'create'])->name('admin.categories.add-category');
// Route::post('/ajoutCate', [CategoryController::class, 'store'])->name('ajoutCate');

// Route::get('/admin/categories', [CategoryController::class, 'index'])
// ->name('categories.index');

// Route::get('/admin/products/add', [CategoryController::class, 'list'])
// ->name('categorie.add');





// Route::get('admin/{id}', [ProductController::class, 'destroy']);


// Route::get('admin/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.product-edit');
// Route::get('admin/{id}/update', [ProductController::class, 'update'])->name('admin.products.product-edit');

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


require __DIR__.'/auth.php';


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
