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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Category Controller//
Route::get('/category/{cat_id?}','CategoryController@index')->name('category.show');
Route::post('/category/store','CategoryController@store')->name('category.store');
Route::post('/category/update','CategoryController@update')->name('category.update');
Route::get('/category/delete/{cat_id}','CategoryController@delete')->name('category.delete');
Route::get('/category/status/{cat_id}/{cat_stats}','CategoryController@status')->name('category.status');
//product Controller//
Route::get('/product/{pro_id?}','ProductController@index')->name('product.show');
Route::post('/product/store','ProductController@store')->name('product.store');
Route::post('/product/update','ProductController@update')->name('product.update');
Route::get('/product/status/{pro_id}/{pro_status}','ProductController@status')->name('product.status');
Route::get('/product/delete/{pro_id}','ProductController@delete')->name('product.delete');
//////Order Manage///
Route::get('/order/manage','ManageOrderController@index')->name('order.manage');
Route::get('/order/details/{order_id}','ManageOrderController@orderDetails')->name('order.details');
Route::get('/order/invoce/{order_id}','ManageOrderController@orderInvoice')->name('order.invoice');
Route::get('/order/invoce/download/{order_id}','ManageOrderController@orderInvoicedownload')->name('invoice.download');



///Frontend Controlller///
Route::get('/','frontend\IndexController@index');
Route::get('/product/details/{pro_id}','frontend\IndexController@productDetails')->name('product.details');
Route::get('/shop/{cat_id?}','frontend\IndexController@shopIndex')->name('shop.index');
//Cart Controller/////////
Route::post('/cart/add','frontend\CartController@addCart')->name('cart.add');
Route::post('/cart/update','frontend\CartController@updateCart')->name('cart.update');
Route::get('/cart/delete/{pro_id}','frontend\CartController@deleteCart')->name('cart.delete');
///checkOut
Route::get('/checkout/user','frontend\CheckoutController@index')->name('cheackout.form')->middleware('checkout');
Route::post('/cart/user/store','frontend\CheckoutController@userStore')->name('user.store');
Route::post('/cart/user/login','frontend\CheckoutController@userlogin')->name('user.login');
Route::get('/shipping/{ship_id?}','frontend\CheckoutController@shipping')->name('shipping.form')->middleware('notlogin');
Route::post('/shipping/store','frontend\CheckoutController@shippingStore')->name('shipping.store');
Route::get('/payment/info','frontend\CheckoutController@paymentInfo')->name('payment.info')->middleware('notlogin','shipping');
////order/////
Route::post('/order/store','frontend\CheckoutController@orderStore')->name('order.store')->middleware('notlogin','payment');
/////Custromer///
Route::get('/custromer/logout','CustromerController@custromerLogout')->name('custromer.logout');
Route::post('/cart/user/login','CustromerController@userlogin')->name('user.login');
////jquery check/////////
Route::get('/eamil/check','frontend\CheckoutController@eamilCheck')->name('email.check');
Route::get('/phone/check','frontend\CheckoutController@phoneCheck')->name('phone.check');









