<?php

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
    Route::get('update-cart', 'CartController@update');

    // Order
    Route::get('checkout', 'OrderController@create');
    Route::post('order', 'OrderController@store');
});

//Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin'], function () {
    Route::get('/', 'LoginController@showLogin')->name('showLogin');
    Route::post('/handle', 'LoginController@handleLogin')->name('handleLogin');
    Route::get('/logout', 'LoginController@logout')->name('logout');
    Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
    //Product
    Route::get('/product', 'ProductController@listAllProducts')->name('listAllProducts');
});
