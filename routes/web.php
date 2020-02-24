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



Route::get('/', 'HomeController@index')->name('home');

Route::get('/about',function(){
	return view('frontend.about');
});

Route::get('/contact',function(){
	return view('frontend.contact');
});

Route::resource('/blogs','BlogController');
Route::resource('/comments','CommentController');

Route::resource('/shop','ShopController');

Route::get('/shop/products/{slug}','ShopController@categoryProduct')->name('shop.categoryProduct');
Route::get('/shop/product/{slug}','ShopController@singleProduct')->name('shop.singleProduct');

Route::get('/cart','ShopController@cart');

Route::get('/cart/addProduct/{id}','ShopController@addCart')->name('product.addToCart');
Route::post('/cart/updateProduct/{id}','ShopController@updateQuantityOnCart')->name('product.updateToCart');

Route::get('/shopping-cart','ShopController@getCart')->name('product.shoppingCart');

Route::get('/reduce/{id}','ShopController@getReduceByOne')->name('product.reduceByOne');
Route::get('/prodcutRemove/{id}','ShopController@getRemoveItem')->name('product.prodcutRemove');

Auth::routes();

Route::middleware(['auth','auth.user'])->group(function(){
	Route::get('/checkout','ShopController@getCheckout')->name('checkout');
	Route::post('/checkout','ShopController@postCheckout')->name('checkout');

	Route::resource('/profile','UserController');


});


Route::namespace('Admin')->prefix('admin')->middleware(['auth','auth.admin'])->name('admin.')->group(function(){

	Route::get('/','UserController@index')->name('admin');

	//Route::resource('/users','UserController',['except'=>['show','create','store']]);

	Route::get('category/{category}/remove', 'CategoryController@remove')->name('category.remove');
	Route::get('category/trash', 'CategoryController@trash')->name('category.trash');
	Route::get('category/recover/{id}', 'CategoryController@recoverCat')->name('category.recover');
	Route::resource('category','CategoryController');


	// product
	Route::get('product/{product}/remove', 'ProductController@remove')->name('product.remove');
	Route::get('product/trash', 'ProductController@trash')->name('product.trash');
	Route::get('product/recover/{id}', 'ProductController@recoverProduct')->name('product.recover');
	Route::resource('product','ProductController');


	//blog
	Route::get('blog/{blog}/remove', 'BlogController@remove')->name('blog.remove');
	Route::get('blog/trash', 'BlogController@trash')->name('blog.trash');
	Route::get('blog/recover/{id}', 'BlogController@recoverBlog')->name('blog.recover');
	Route::resource('blog','BlogController');


	//Order
	Route::get('order/{order}/remove', 'OrderController@remove')->name('order.remove');
	Route::get('order/trash', 'OrderController@trash')->name('order.trash');
	Route::get('order/recover/{id}', 'OrderController@recoverOrder')->name('order.recover');
	Route::get('order/confirm/{id}', 'OrderController@confirmOrder')->name('order.confirm');
	Route::resource('order','OrderController');


	//Setiings

	Route::get('/about',function(){return view('admin.settings.about');	});
	Route::post('/about','SettingController@aboutAdd')->name('about.add');
	Route::put('/about/{id}','SettingController@aboutUpdate')->name('about.update');

	Route::get('/siteinfo',function(){return view('admin.settings.siteinfo');	});
	Route::post('/siteinfo','SettingController@siteinfoAdd')->name('siteinfo.add');
	Route::put('/siteinfo/{id}','SettingController@siteinfoUpdate')->name('siteinfo.update');

	//bakups
	Route::resource('backup', 'BackupController');

	
	//Client
    Route::resource('client', 'ClientController');


});