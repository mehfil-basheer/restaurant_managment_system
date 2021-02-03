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


Route::view('/', 'welcome');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/home', 'DashboardController@index');

Route::resource('orders', 'OrderController'); 
Route::resource('category', 'CategoryController');
// Route::view('/customer', 'customer/index');


Route::get('customer','CustomerController@index')->name('customer.index');

Route::post('customer/store','CustomerController@store')->name('customer.store');

Route::get('/customers/{customer}/edit','CustomerController@edit')->name('customer.edit');
Route::delete('customer/{customer}','CustomerController@destroy')->name('customer.delete');

Route::resource('menu', 'FoodItemController');
Route::resource('coupon', 'CouponCodeController');
Route::resource('discount', 'DiscountController');
Route::resource('delivery-location', 'DeliveryController');


Route::match(['get', 'post'], 'delivery-location-settings', 'DeliveryController@settings')->name('delivery-location.settings');

Route::get('/password/create/{password}', 'DashboardController@password');

// Route::prefix('api')->group(function () {
//     Route::get('menu', 'ApiController@menus');
//     Route::get('category', 'ApiController@categories');
// });
