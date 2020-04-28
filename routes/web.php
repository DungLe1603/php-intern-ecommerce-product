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

//Cart
Route::get('cart', 'ShopController@cart');
Route::get('add-to-cart/{id}', 'ShopController@addToCart');
Route::get('remove-from-cart/{id}', 'ShopController@removeFromCart');
//Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin'], function () {
    Route::get('/', 'LoginController@showLogin')->name('showLogin');
    Route::post('/handle', 'LoginController@handleLogin')->name('handleLogin');
    Route::get('/logout', 'LoginController@logout')->name('logout');
    Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
    //Product
    Route::get('/product', 'ProductController@listAllProducts')->name('listAllProducts');
    Route::get('/edit/{id}', 'ProductController@editProduct')->name('editProduct');
    Route::put('/update/{id}', 'ProductController@updateProduct')->name('updateProduct');
});
