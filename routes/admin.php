<?php
//Login
Route::get('admin/login', 'AdminController@login');
Route::post('admin/dang-nhap', 'AdminController@dangnhap');
Route::group(['prefix' => 'admin', 'middleware' => 'Admin'], function () {
		Route::get('logout', 'AdminController@logout');
		Route::get('dashboard', 'AdminController@dashboard');
		Route::get('profile', 'ProfileController@view');
		Route::post('changePwd', 'ProfileController@changepass');
		Route::post('edit-account', 'ProfileController@editaccount');
		Route::post('change-avatar', 'ProfileController@changeavatar');
		//Categories
		Route::group(['prefix' => 'category', 'middleware' => 'Admin'], function () {
			Route::get('view-category', 'CategoryController@viewcate');
			Route::post('add-category', 'CategoryController@add');
			Route::post('edit-modal', 'CategoryController@editModal');
			Route::post('edit', 'CategoryController@edit');
			Route::post('delete', 'CategoryController@delete');
			Route::post('change-status', 'CategoryController@changestatus');
			Route::post('changeSort', 'CategoryController@changeSort');
		});
		//Product
		Route::group(['prefix' => 'product', 'middleware' => 'Admin'], function () {
				Route::get('view-product', 'ProductController@viewpro');
				Route::get('add', 'ProductController@add');
				Route::post('add-pro', 'ProductController@addpro');
				Route::match(['get', 'post'], 'edit-pro/{url}', 'ProductController@editpro');
				Route::post('delete-pro', 'ProductController@delpro');
				Route::match(['get', 'post'], 'add-image/{url}', 'ProductController@addimg');
				Route::post('delete-img', 'ProductController@deimg');
				Route::post('modal-size', 'ProductController@modalsize');
				Route::post('add-size', 'ProductController@addsize');
				Route::post('update-size', 'ProductController@updatesize');
				Route::post('edit-stock', 'ProductController@editstock');
				Route::post('delete-size', 'ProductController@deletesize');

		});
	   //Attribute-Color
		Route::group(['prefix' => 'attribute', 'middleware' => 'Admin'], function () {
				Route::match(['get', 'post'], 'view-attribute-size', 'ProductController@attributesize');
				Route::post('del-attribute-size', 'ProductController@delattributesize');
		});
		//Silder
		Route::group(['prefix' => 'media', 'middleware' => 'Admin'], function () {
				Route::get('view-media', 'MediaController@view');
				Route::match(['get', 'post'], 'add-media', 'MediaController@add');
				Route::post('edit-modal', 'MediaController@editModal');
				Route::post('edit-media', 'MediaController@edit');
				Route::post('delete', 'MediaController@delete');
				//Route::match(['get', 'post'], 'discount', 'MediaController@discount');
	    });
	    //Config
		Route::group(['prefix' => 'config', 'middleware' => 'Admin'], function () {
		Route::match(['get','post'],'view-config', 'ConfigController@view');
		Route::match(['get','post'],'edit-config', 'ConfigController@edit');
	    });
	    //Order
		Route::group(['prefix' => 'order', 'middleware' => 'Admin'], function () {
			Route::resource('view-order', 'OrderDataController');
			//Route::match(['get','post'],'view-order', 'OrderDataController@index');
			Route::match(['get', 'post'], 'view-orderdetail/{id}', 'OrderController@vieworderdetail');
			Route::post('change-status', 'OrderController@changestatus');
			Route::post('change-customer', 'OrderController@changecustomer');
			Route::post('change-order', 'OrderController@changeorder');
			Route::post('log', 'OrderController@log');
			// Route::post('filterdate', 'OrderController@filterdate');
			//Route::get('filter', 'OrderController@tkorder');

			Route::post('sendmail', 'OrderController@sendmail');
			Route::get('invoice/{id}','OrderController@invoice');
			Route::post('send-coupon','OrderController@sendcoupon');
	    });
	   //Coupon
   		Route::group(['prefix' => 'coupon', 'middleware' => 'Admin'], function () {
			Route::match(['get', 'post'], 'view-coupon', 'CouponController@viewcoupon');
			Route::match(['get', 'post'], 'edit-modal', 'CouponController@editmodal');
			Route::post('add-coupon', 'CouponController@addcoupon');
			Route::post('edit-coupon', 'CouponController@editcoupon');
			Route::post('delete-coupon', 'CouponController@deletecoupon');
		});
		//Customer
		Route::group(['prefix' => 'customer', 'middleware' => 'Admin'], function () {
			Route::match(['get', 'post'], 'view-customer', 'CustomerController@view');
		});
		//User
		Route::group(['prefix' => 'user', 'middleware' => 'Admin'], function () {
		Route::get('view-user','AdminController@view');
		Route::post('add-user','AdminController@add');
		Route::post('delete-user','AdminController@delete');
		Route::match(['get', 'post'],'edit-user/{id}','AdminController@edit');
		Route::post('edit-post-user','AdminController@postedit');
		Route::post('reset-pass','AdminController@resetpass');
		Route::get('logout','AdminController@logout');
		});
		//Blog
		Route::group(['prefix' => 'blog', 'middleware' => 'Admin'], function () {
			Route::get('view-blog','BlogController@view');
			Route::match(['get', 'post'],'add-blog','BlogController@add');
			Route::match(['get', 'post'],'addaction','BlogController@addaction');
			Route::match(['get', 'post'],'edit-blog/{id}','BlogController@edit');
			Route::match(['get', 'post'],'editaction','BlogController@editaction');
			Route::post('delete','BlogController@delete');
		});
	    //Contact
		Route::group(['prefix' => 'contact', 'middleware' => 'Admin'], function () {
			Route::get('view-contact','ContactController@view');
			Route::post('open-modal','ContactController@openmodal');
		});
		//Thong ke
		Route::group(['prefix' => 'thong-ke', 'middleware' => 'Admin'], function () {
			Route::get('thong-ke-sp','FilterController@sanpham');
			Route::post('filter','FilterController@filter');
		});
});

