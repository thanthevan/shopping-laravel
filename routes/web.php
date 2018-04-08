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
//page
Route::get('/gioi-thieu/ve-chung-toi', function() {
    return view('page.contact.about');
})->name('info');
Route::get('/gioi-thieu/chinh-sach-mua-hang', function() {
    
})->name('rules');
Route::get('/gioi-thieu/huong-dan-mua-hang', function() {
      return view('page.home.home');
})->name('support');

Route::get('/lien-he', function() {

})->name('contact');
Route::get('/','HomeController@index')->name('home');
//blog
Route::get('/tin-tuc','PostController@blog')->name('blog');
Route::get('/tin-tuc/bai-viet/{id}','PostController@post')->name('post');
//product
Route::post('/xem-nhanh','ProductController@quickview')->name('quickview');
Route::get('/san-pham','ProductController@list')->name('product');
Route::get('/loc-size','ProductController@fill_size')->name('fill-size');

Route::get('/san-pham/{parent_alias}/{alias}', 'ProductController@listbygroup')->name('catebyname');

Route::get('/chi-tiet/{alias}/{id}', 'ProductController@detailproduct')->name('detailproduct');



//cart
Route::get('/gio-hang','CartController@list')->name('cart-list');
Route::get('/xoa-tat-ca','CartController@deleteall')->name('cart-delete-all');

//cart-ajax
Route::get('/cart-ajax','CartController@listajax')->name('cart-ajax');
Route::post('/cart-ajax-delete','CartController@deleteajax')->name('cart-ajax-delete');
Route::post('/cart-ajax-add','CartController@addajax')->name('cart-ajax-add');
Route::post('/cart-ajax-update','CartController@update')->name('cart-ajax-update');
//user

Route::get('/dang-nhap','UserController@getauthen')->name('login-user');
Route::get('/dang-ky','UserController@getauthen')->name('register-user');
Route::post('/dang-nhap','UserController@login')->name('login-us');
Route::post('/dang-ky','UserController@register')->name('register-us');
Route::get('/dang-xuat','UserController@logout')->name('logout');


Route::group(['middleware'=>'guest'], function() {

    Route::get('/thong-tin','UserController@infouser')->name('infouser');
    Route::get('/don-hang-da-dat','UserController@infoorder')->name('infoorder');
    Route::post('/nhan-xet-san-pham','ProductController@review')->name('review');
    
    
});
//order
Route::group(['middleware'=>'checkcart'], function() {
    Route::get('/thanh-toan','OrderController@getcheckout')->name('getcheckout');
    Route::post('/xac-nhan-don-hang','OrderController@checkout')->name('checkout');
});

 
//admin

Route::group(['prefix' => 'cp_admin'], function() {
    Route::get('/login','Admin\AdminController@get_login_admin')->name('login');
    Route::get('/logout-admin', 'Admin\AdminController@logout_admin')->name('logout-admin');
    Route::post('/login-admin','Admin\AdminController@login_admin')->name('login-admin');
    Route::group(['middleware'=>'isAdmin'], function() {
        
            Route::get('loc-hoa-don/{status}','Admin\AdminController@get_order_by_status')->name('filter-status'); 
            Route::get('hoa-don/{id}','Admin\AdminController@invoice')->name('invoice');
            Route::get('/','Admin\DashBoardController@index')->name('dashboard');
            Route::resource('category', 'Admin\CategoryController');
            Route::resource('categorypost', 'Admin\CategoryPostController');
            Route::resource('product', 'Admin\ProductController');
            Route::resource('order', 'Admin\OrderController');  
            Route::resource('user', 'Admin\UserController');
            Route::resource('post', 'Admin\PostController');
            Route::resource('role', 'Admin\RoleController');
            Route::resource('feedback', 'Admin\FeedBackController');
            Route::get('employee','Admin\AdminController@employee')->name('employee');
    });
});

Route::get('/test', function() {
  // echo bcrypt('123456');

 

});
