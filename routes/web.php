<?php

/*************************
 * All Application Routes:
 */

/******************
 * FrontEnd Routes:
 */
Route::get('/', 'FrontController@home')->name('home'); 						// homepage route
Route::get('/aboutUs', 'FrontController@aboutUs')->name('aboutUs'); 		// about us route
Route::get('/contactUs', 'FrontController@contactUs')->name('contactUs'); 	// contact us route
Route::get('/category/{id}', 'FrontController@category')->name('category'); // all products route
Route::get('/product/{id}', 'FrontController@product')->name('product'); 	// specific product route
Route::get('/letest', 'FrontController@letest')->name('letest'); 			// specific product route


// navbar for categories
Route::get('/catToProudct/{id}', 'FrontController@catToProudct')->name('cattopro'); 
Route::resource('/cart', 'CartController');	// shoping card resource
// delete cart
Route::delete('/cart/deleteCart', 'CartController@deleteCart')->name('deleteCart');
Route::resource('address', 'AddressController');



/*****************
 * BackEnd Routes:
 */
Auth::routes();

Route::get('home', 'HomeController@index');

Route::get('/logout', 'Auth\LoginController@logout');	// Logout Route

/*****************************************
 * Middleware Route Group For Admin Panel:
 */
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function(){
	Route::get('/', function(){return view('admin.index');})->name('admin.index');	// main dashbord route
	Route::resource('product', 'ProductsController');		// products resource
	Route::resource('category', 'CategoriesController');	// categories resource
});

/*******************
 * Shipping Methods:
 */
Route::get('checkout', 'CheckoutController@step1')->name('checkout');
Route::get('shipping-info', 'CheckoutController@shipping')->name('checkout.shipping');
Route::get('payment', 'CheckoutController@payment')->name('checkout.payment');
Route::post('storePayment', 'CheckoutController@storePayment')->name('payment.store');