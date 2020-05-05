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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'User'], function () {
    //Product
    Route::get('products', 'ProductController@index');
    Route::get('products/{product}', 'ProductController@show');

    //Cart
    Route::get('cart', 'CartController@show');
    Route::get('add-to-cart/{product}', 'CartController@add');
    Route::get('remove-from-cart/{product}', 'CartController@remove');
    Route::patch('update-cart', 'CartController@update');

    // Order
    Route::get('checkout', 'OrderController@create');
    Route::post('order', 'OrderController@store');
});

//Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin'], function () {
    Route::get('/', 'LoginController@showLogin')->name('showLogin')->middleware('checkLoginPages');
    Route::post('/handle', 'LoginController@handleLogin')->name('handleLogin');
    Route::get('/logout', 'LoginController@logout')->name('logout');
    Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard')->middleware('checkLoginAdmin');
    //Product
    Route::get('/product', 'ProductController@index')->name('index');
    Route::get('/create', 'ProductController@create')->name('create');
    Route::post('/store', 'ProductController@store')->name('store');
    Route::get('/edit/{product}', 'ProductController@editProduct')->name('editProduct');
    Route::put('/update/{id}', 'ProductController@update')->name('update');
    Route::get('/exportProduct', 'ProductController@exportProduct')->name('exportProduct');
    Route::post('/importProduct', 'ProductController@importProduct')->name('importProduct');
    Route::delete('/delete/{id}', 'ProductController@destroy')->name('destroy');
    //Order and Order Product
    Route::get('/order', 'OrderController@showOrder')->name('showOrder');
    Route::get('/order/{id}', 'OrderController@orderProduct')->name('orderProduct');
});
