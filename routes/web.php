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

Route::get('/gioi-thieu/huong-dan-mua-hang','HomeController@support')->name('support');

Route::get('/lien-he','HomeController@contact')->name('contact');
Route::post('/fb','HomeController@feedback')->name('fb');
Route::get('/','HomeController@index')->name('home');
//blog
Route::get('/tin-tuc','PostController@blog')->name('blog');
Route::get('/tin-tuc/{alias}','PostController@blogcate')->name('blogcate');
Route::get('/tin-tuc/bai-viet/{id}','PostController@post')->name('post');
//product
Route::post('/xem-nhanh','ProductController@quickview')->name('quickview');
Route::get('/san-pham','ProductController@list')->name('product');
Route::get('/loc-size','ProductController@fill_size')->name('fill-size');
Route::post('/loc-gia','ProductController@fill_price')->name('fill-price');
Route::post('/tim-kiem','ProductController@search')->name('findproduct');

Route::get('/san-pham/{parent_alias}/{alias}', 'ProductController@listbygroup')->name('catebyname');
Route::get('/loai-san-pham/{alias}', 'ProductController@typeproduct')->name('typeproduct'); 
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
    Route::post('updateinfo','UserController@updateinfo' )->name('updateinfo');
    Route::get('/thong-tin','UserController@infouser')->name('infouser');
    Route::get('/don-hang-da-dat','UserController@infoorder')->name('infoorder');
    Route::post('/nhan-xet-san-pham','ProductController@review')->name('review');
    Route::post('/viewod','UserController@vieworder')->name('vod');
    Route::post('/deleteorder', 'UserController@deleteorder')->name('deleteorder');;
    
    
});
Route::get('/huy-don-hang/{has}','OrderController@delorder')->name('delorder');
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
            Route::post('filter','Admin\AdminController@filteruser')->name('filter');
            Route::post('filteremployee','Admin\AdminController@filteremployee')->name('filteremployee');
            Route::post('sendmail','Admin\AdminController@sendmail')->name('sendmail');

            Route::post('addemployee','Admin\AdminController@addemployee')->name('addemployee');
            Route::get('deleteemployee/{id}','Admin\AdminController@deleteemployee')->name('deleteemployee');
             Route::get('showemployee/{id}','Admin\AdminController@showemployee')->name('showemployee');
             Route::post('updateemployee','Admin\AdminController@updateemployee')->name('updateemployee');

             Route::get('thong-ke','Admin\StatisticalController@index')->name('statistical');
             Route::get('loc/{start}/{end}/{type}','Admin\StatisticalController@filters')->name('filters');

             Route::get('xuat-excel/{start}/{end}/{type}','Admin\StatisticalController@exportExecl')->name('exportExecl');
             Route::post('cap-nhat-thong-tin','Admin\DashBoardController@about')->name('about');
               Route::post('send','Admin\AdminController@send')->name('send');

            Route::get('/loc-bai-viet-theo-danh-muc/{id}','Admin\AdminController@get_post_by_pci');
            Route::post('/revenueData','Admin\StatisticalController@revenueData')->name('revenueData');
            Route::get('/revenueView','Admin\StatisticalController@revenueView')->name('revenueView');
    }); 

});

Route::get('/test/{id}', function($id) {

   $count =App\OrderDetail::count_product_order($id);

 dd(  $count);
});
