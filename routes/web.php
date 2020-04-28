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


// User
Route::get('products', 'ShopController@index');
Route::get('products/{product}', 'ShopController@show');

//Cart
Route::get('cart', 'ShopController@showCart');
Route::get('add-to-cart/{product}', 'ShopController@addToCart');
Route::get('remove-from-cart/{product}', 'ShopController@removeFromCart');
Route::get('update-cart', 'ShopController@updateCart');

//Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin'], function () {
    Route::get('/', 'LoginController@showLogin')->name('showLogin');
    Route::post('/handle', 'LoginController@handleLogin')->name('handleLogin');
    Route::get('/logout', 'LoginController@logout')->name('logout');
    Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
    //Product
    Route::get('/product', 'ProductController@listAllProducts')->name('listAllProducts');
});
