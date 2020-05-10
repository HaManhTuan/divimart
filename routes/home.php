<?php
//Home 
Route::get('/','HomeController@index');
Route::get('/filter-price','HomeController@filterprice');
Route::get('contact','HomeController@contact');
Route::post('contact-post','HomeController@contactpost');
Route::get('blog','BlogController@blog');
Route::get('blog/{id}','BlogController@blogdetail');
Route::get('/logout-home', 'CustomerController@logout');
////register-login
Route::get('register-login','CustomerController@registerlogin');
Route::get('registerfrm','CustomerController@registerfrm');
Route::get('loginfrm','CustomerController@loginfrm');
Route::get('register-login','CustomerController@registerlogin');
//Category
Route::get('danh-muc/{url}','HomeController@category');
// Route::post('load_data','HomeController@loaddata');
//Detail
Route::match(['get','post'],'chi-tiet/{url}','HomeController@detail');
//Register
Route::post('/register','CustomerController@registation');
//login
Route::post('/login', 'CustomerController@login');
//Cart
Route::group(['prefix' => 'cart'], function () {
	Route::post('add-to-cart','CartController@addtocart');
	Route::post('coupon-cart','CartController@couponcart');
	Route::post('check-size-stock','CartController@checksizestock');
	Route::get('view-cart','CartController@viewcart');
	Route::get('updateCart','CartController@updatecart');
	Route::post('removeCart','CartController@removecart');
	Route::get('view-cart-step-2','CartController@viewcartstep2');
	Route::get('view-cart-step-3','CartController@viewcartstep3');
	Route::match(['get','post'],'view-cart-final','CartController@finish');
	Route::match(['get','post'],'thanks','CartController@thank');
});

//Account
Route::group(['prefix' => 'account', 'middleware' => 'Home'], function () {
	Route::match(['get', 'post'], '/view-account', 'CustomerController@viewaccount');
	Route::match(['get', 'post'], '/edit-account', 'CustomerController@editaccount');
	Route::get('logout','CustomerController@logout');
	Route::post('edit-password','CustomerController@editpassword');
	Route::match(['get', 'post'], '/history-order', 'CustomerController@historyorder');
	Route::match(['get', 'post'], '/history-orderdetail', 'CustomerController@historyorderdetail');
});
Route::post('search-product','HomeController@searchproduct');