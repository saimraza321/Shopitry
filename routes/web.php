<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NewProductController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\TopSellingController;
use App\Http\Controllers\singleProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\singleProductStoreController;
use App\Http\Controllers\AddToCartController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController ;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|



Route::get('/',function(){
    return view('Front-end.index');
});*/
Route::get('/admin',function(){
    return view('Admin.dashboard');
});
Route::get('/login',function(){
    return view('login');
});

Route::post('/logoutA',function(){
    Auth::logout();

    return view('Front-end.login');
})->name('logoutA');

Route::controller(NewProductController::class)->prefix('newproduct')->name('newproduct.')->group(function(){        
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::post('/{id}/update', 'update')->name('update');
    Route::get('/{id}/delete', 'delete')->name('delete');
});
Route::controller(TopSellingController::class)->prefix('top_selling')->name('top_selling.')->group(function(){        
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::post('/{id}/update', 'update')->name('update');
    Route::get('/{id}/delete', 'delete')->name('delete');
});
Route::controller(FrontEndController::class)->name('front.')->group(function(){        
    Route::get('/', 'index')->name('index');
    Route::get('/products', 'products')->name('products');


});
Route::controller(UserController::class)->group(function(){        
    Route::get('/login', 'login')->name('login');
    Route::post('/register', 'register')->name('register');
    Route::post('/signin', 'signin')->name('signin');
    Route::get('/logout', 'logout')->name('logout');

}); 
Route::controller(singleProductController::class)->group(function(){        
    Route::get('/singleproduct/{id}', 'single_product')->name('singleproduct');
  

});
Route::controller(singleProductStoreController::class)->group(function(){        
    Route::get('/single/{id}', 'single_product')->name('single');
  

});
Route::controller(AddToCartController::class)->group(function(){        
    Route::post('/addtocart', 'addToCart')->name('addToCart');
    Route::get('/cart', 'index')->name('cart');
    Route::get('/deletCartItem/{id}', 'deletCartItem')->name('deletCartItem');

});

Route::controller(ProductsController::class)->prefix('admin/products')->name('products.')->group(function(){        
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::post('/{id}/update', 'update')->name('update');
    Route::get('/{id}/delete', 'delete')->name('delete');
});
Route::controller(CategoryController::class)->prefix('admin/category')->name('categories.')->group(function(){        
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::post('/{id}/update', 'update')->name('update');
    Route::get('/{id}/delete', 'delete')->name('delete');
});
Route::controller(BrandController::class)->prefix('admin/brand')->name('brand.')->group(function(){        
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::post('/{id}/update', 'update')->name('update');
    Route::get('/{id}/delete', 'delete')->name('delete');
});

// Route for filtering products
Route::get('/products/filter', [ProductsController::class, 'filter'])->name('products.filter');
