<?php

use Maatwebsite\Excel\Facades\Excel;


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

Route::group(['namespace' => 'User'], function () {
    Route::get('/', function () {
        return view('user.welcome');
    })->name('home');

    //Product
    Route::get('products', 'ProductController@index')->name('products.index');
    Route::get('products/{product}', 'ProductController@show')->name('products.show');

    //Cart
    Route::get('cart', 'CartController@show');
    Route::get('add-to-cart/{product}', 'CartController@add')->name('cart.add');
    Route::get('remove-from-cart/{product}', 'CartController@remove')->name('cart.remove');
    Route::patch('update-cart', 'CartController@update');

    // Order
    Route::get('orders', 'OrderController@index')->name('orders.index');
    Route::get('checkout', 'OrderController@create')->name('orders.create');
    Route::post('order', 'OrderController@store')->name('orders.store')->middleware('checkStock');
    Route::get('find-orders', 'OrderController@find')->name('orders.find');
    Route::get('order/{order}', 'OrderController@download')->name('orders.download');
});

//Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin'], function () {
    Route::get('/', 'LoginController@showLogin')->name('showLogin')->middleware('checkLoginPages');
    Route::post('/handle', 'LoginController@handleLogin')->name('handleLogin');
    Route::get('/logout', 'LoginController@logout')->name('logout');
    Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard')->middleware('checkLoginAdmin');
    //Product
    Route::get('/product', 'ProductController@listAllProducts')->name('listAllProducts');
    Route::post('/store', 'ProductController@store')->name('store');
    Route::get('/edit/{product}', 'ProductController@editProduct')->name('editProduct');
    Route::put('/update/{id}', 'ProductController@update')->name('update');
    Route::get('/exportProduct', 'ProductController@exportProduct')->name('exportProduct');
    Route::post('/importProduct', 'ProductController@importProduct')->name('importProduct');
    Route::delete('/destroyProduct/{id}', 'ProductController@destroyProduct')->name('destroyProduct');
});
