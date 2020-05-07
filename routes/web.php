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
    //Products
    Route::get('/', 'ProductController@welcome')->name('home');
    Route::get('products', 'ProductController@index')->name('products.index');
    Route::get('products/{product}', 'ProductController@show')->name('products.show');

    //Cart
    Route::get('cart', 'CartController@show')->name('cart.show');
    Route::get('add-to-cart/{product}', 'CartController@add')->name('cart.add');
    Route::get('remove-from-cart/{product}', 'CartController@remove')->name('cart.remove');
    Route::patch('update-cart', 'CartController@update');

    // Orders
    Route::get('orders', 'OrderController@index')->name('orders.index');
    Route::get('checkout', 'OrderController@create')->name('orders.create');
    Route::post('order', 'OrderController@store')->name('orders.store')->middleware('checkStock');
    Route::get('find-orders', 'OrderController@find')->name('orders.find');
    Route::get('order/{order}', 'OrderController@download')->name('orders.download');
});

//Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin'], function () {
    Route::group(['prefix' => '/'], function () {
        Route::get('/', 'LoginController@showLogin')->name('showLogin')->middleware('checkLoginPages');
        Route::post('/login', 'LoginController@login')->name('login');
        Route::get('/logout', 'LoginController@logout')->name('logout');
    });
    //Product in Admin Pages
    Route::resource('products', 'ProductController')->middleware('checkLoginAdmin');
    Route::group(['prefix' => 'products/', 'as' => 'products.', 'middleware' => 'checkLoginAdmin'], function () {
        Route::get('/export', 'ProductController@exportProduct')->name('exportProduct');
        Route::post('/import', 'ProductController@importProduct')->name('importProduct');
    });
    //Order and Order Product in Admin Pages
    Route::group(['prefix' => '/', 'as' => 'order.', 'middleware' => 'checkLoginAdmin'], function () {
        Route::get('/order', 'OrderController@index')->name('index');
        Route::get('/orderProduct/{id}', 'OrderController@orderProduct')->name('orderProduct');
    });
});
