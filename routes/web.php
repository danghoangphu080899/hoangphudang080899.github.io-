<?php

use Illuminate\Support\Facades\Route;

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

Route::post('/sendmail','MailController@send_mail')->name('send_mail');
Route::get('/forgetPass','MailController@forget_pass')->name('forget_pass');
Route::post('/recoverPass','MailController@recover_pass')->name('recover_pass');
Route::get('/updateNewPass','MailController@update_pass')->name('update_pass');
Route::post('/processNewPass','MailController@process_pass')->name('process_pass');
Route::post('/changePass','HomeController@change_pass')->name('change_pass');
Route::get('/validate_email','AuthController@validate_email')->name('validate_email');
Route::get('/validate_email_forget','AuthController@validate_email_forget')->name('validate_email_forget');
Route::get('/send_mail_sub','MailController@send_mail_sub')->name('send_mail_sub');
Route::get('/send_mail_sub_post','MailController@send_mail_sub_post')->name('send_mail_sub_post');
Route::post('/send_coupon', 'MailController@send_coupon')->name('send_coupon');
Route::get('register/verify/{code}', 'AuthController@verify');

Route::get('/demo', 'MailController@demo')->name('demo');
//frontend
Route::get('/404','HomeController@error')->name('404');
Route::get('/','HomeController@index');
Route::get('/trangchu', 'HomeController@index')->name('trangchu');

Route::get('/login', 'AuthController@getlogin')->name('login');
Route::get('/register', 'AuthController@getregister')->name('register');

Route::get('/redirect/{provider}', 'AuthController@redirect')->name('login_fb.redirect');
Route::get('/callback/{provider}', 'AuthController@callback');

Route::get('/redirect/{provider}', 'AuthController@redirect')->name('login_gg.redirect');
Route::get('/callback/{provider}', 'AuthController@callback');

Route::post('/dangnhap', 'AuthController@postLogin');
Route::post('/dangky', 'AuthController@postRegister');
Route::get('/logout', 'AuthController@logout')->name('logout');

//Route::get('/dangnhap', 'HomeController@dangnhap');
//
Route::get('/add_address', 'HomeController@add_address')->name('add_address');
Route::post('/select_delivery', 'HomeController@select_delivery')->name('select_delivery');
Route::post('/select_delivery_admin', 'HomeController@select_delivery_admin')->name('select_delivery_admin');
Route::post('/select_delivery_admin_edit', 'HomeController@select_delivery_admin_edit')->name('select_delivery_admin_edit');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/profile', 'HomeController@profile')->name('profile')->middleware('login');
Route::post('/delAddress/{id_address}', 'HomeController@del_address')->name('del_address');
Route::post('/editProfile', 'HomeController@edit_profile')->name('edit_profile');

Route::get('/detail_product/{id_product}', 'ProductController@DetailProduct')->name('detail_product');
Route::post('/review', 'ProductController@review')->name('review');
Route::get('/review_del/{id1}/{id2}', 'ProductController@review_del')->name('review_del');

Route::get('/detail_post/{id_post}', 'PostController@detailPost')->name('detail_post');
Route::get('/post-grip', 'PostController@PostGrip')->name('PostGrip');
Route::get('/post-grip/{id}', 'PostController@PostGripCate')->name('PostGripCate');
Route::post('/comment', 'PostController@comment')->name('comment');
Route::get('/com_del/{id}', 'PostController@com_del')->name('com_del');


Route::get('/AddCart/{id}', 'CartController@AddCart')->name('AddCart');
Route::post('/AddsCart', 'CartController@AddsCart')->name('AddsCart');
Route::get('/DeleteCart/{id}', 'CartController@DeleteCart')->name('DeleteCart');
Route::get('/DeleteListCart/{id}', 'CartController@DeleteListCart')->name('DeleteListCart');
Route::get('/UpdateListCart/{id}/{quanty}', 'CartController@UpdateListCart')->name('UpdateListCart');

Route::post('/editCart', 'CartController@edit_cart')->name('edit_cart');

Route::get('/mycart', 'CartController@index')->name('mycart');
Route::post('/check_coupon', 'CartController@check_coupon')->name('check_coupon');
Route::get('/unset_coupon', 'CartController@unset_coupon')->name('unset_coupon');



Route::get('/checkout', 'CartController@checkout')->name('checkout');
Route::post('/payment', 'CartController@payment')->name('payment');
Route::post('/payment_paypal', 'CartController@payment_paypal')->name('payment_paypal');
Route::get('/oldOrder', 'CartController@oldOrder')->name('oldOrder');
Route::get('/wishlist', 'CartController@wishlist')->name('wishlist');
Route::get('/add_wishlist/{id}', 'CartController@add_wishlist')->name('add_wishlist');
Route::get('/DeleteWishlist/{id}', 'CartController@DeleteWishlist')->name('DeleteWishlist');
 

Route::get('/category-list/{id}', 'HomeController@products_category_list')->name('products_category_list');
Route::get('/category-grid/{id}', 'HomeController@products_category_grid')->name('products_category_grid');

Route::get('/test/{id1}/{id2}', 'ProductController@test')->name('test');
Route::get('/search', 'HomeController@search')->name('search');
Route::get('/order-history', 'HomeController@order_history')->name('order-history');
Route::get('/cancel-order/{id}', 'HomeController@cancel_order')->name('cancel_order');
Route::get('/del-order/{id}', 'HomeController@del_order')->name('del_order');

///backend
Route::group(['prefix'=>'/admin'],function(){
    
    Route::get('/', 'AdminController@index')->name('dashboard');
	Route::get('/allProduct', 'ProductController@getall_product')->name('all_product');
	Route::get('/addProduct', 'ProductController@getadd_product')->name('add_product');
	Route::post('/addProduct', 'ProductController@postadd_product')->name('postadd_product');
	Route::get('/editProduct/{id_product}', 'ProductController@getedit_product')->name('edit_product');
	Route::post('/editProduct/{id_product}', 'ProductController@postedit_product')->name('postedit_product');
	Route::get('/hidden_product/{id_product}', 'ProductController@hidden_product')->name('hidden_product');
	Route::get('/show_product/{id_product}', 'ProductController@show_product')->name('show_product');

	Route::post('/delImg/{id_img}', 'ProductController@getdel_Img')->name('getdel_Img');
	Route::post('/delProduct/{id_product}', 'ProductController@getdel_product')->name('getdel_product');

	Route::get('/allUser', 'UserController@getall_user')->name('all_user');
	Route::get('/allAdmin', 'UserController@getall_admin')->name('all_admin');
	
	Route::get('/hidden_user/{id}', 'UserController@hidden_user')->name('hidden_user');
	Route::get('/show_user/{id}', 'UserController@show_user')->name('show_user');
	Route::get('/hidden_admin/{id}', 'UserController@hidden_admin')->name('hidden_admin');
	Route::get('/show_admin/{id}', 'UserController@show_admin')->name('show_admin');
	Route::get('/addUser', 'UserController@getadd_user')->name('add_user');
	Route::get('/addAdmin', 'UserController@getadd_admin')->name('add_admin');
	Route::post('/addUser', 'UserController@postadd_user')->name('postadd_user');
	Route::post('/addAdmin', 'UserController@postadd_admin')->name('postadd_admin');
	Route::get('/delUser/{id_user}', 'UserController@getdel_user')->name('getdel_user');

	Route::get('/allOrder', 'OrderController@getall_order')->name('all_order');
	Route::get('/editOrder/{id_order}', 'OrderController@getedit_order')->name('getedit_order');
	Route::post('/editOrder/{id_order}', 'OrderController@postedit_order')->name('postedit_order');
	Route::get('/delOrder/{id_order}', 'OrderController@getdel_order')->name('getdel_order');

	Route::post('/filter-bydate', 'AdminController@filter_bydate')->name('filter_bydate');
	Route::post('/filter-30day', 'AdminController@filter_30day')->name('filter_30day');
	Route::post('/dashboard-filter', 'AdminController@dashboard_filter')->name('dashboard_filter');
	
	Route::get('/allCategory', 'CategoryProductController@allCategory')->name('allCategory');
	Route::post('/postedit_cate', 'CategoryProductController@postedit_cate')->name('postedit_cate');
	
	Route::get('/allCoupon', 'CouponController@allCoupon')->name('allCoupon');
	Route::post('/postadd_coupon', 'CouponController@postadd_coupon')->name('postadd_coupon');
	Route::post('/postedit_coupon', 'CouponController@postedit_coupon')->name('postedit_coupon');
	Route::post('/load_send_coupon', 'CouponController@load_send_coupon')->name('load_send_coupon');
	Route::get('/delete_coupon/{id}', 'CouponController@delete_coupon')->name('delete_coupon');
	Route::post('/check_send_coupon', 'CouponController@check_send_coupon')->name('check_send_coupon');
	
	Route::get('/allProducer', 'ProducerController@allProducer')->name('all_producer');
	Route::post('/postadd_producer', 'ProducerController@postadd_producer')->name('postadd_nsx');
	Route::post('/postedit_producer', 'ProducerController@postedit_producer')->name('postedit_nsx');

	Route::get('/allCatePost', 'CatePostController@allCatePost')->name('allCatePost');
	Route::post('/postadd_catepost', 'CatePostController@postadd_catepost')->name('postadd_catepost');
	Route::post('/postedit_catepost', 'CatePostController@postedit_catepost')->name('postedit_catepost');

	Route::get('/allPost', 'PostController@allPost')->name('allPost');
	Route::get('/addPost', 'PostController@addPost')->name('addPost');
	Route::post('/postadd_post', 'PostController@postadd_post')->name('postadd_post');
	Route::post('/postedit_post', 'PostController@postedit_post')->name('postedit_post');
});
