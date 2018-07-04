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

Route::get('/', 'FrontendController@getHome');
Auth::routes();
//Route::get('test', function (){
//   return view('frontend.mailsuccess');
//});

//Route::post('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('user/activation/{token}', 'Auth\RegisterController@activateUser')->name('user.activate');
Route::get('profile', 'FrontendController@getEditUser');
Route::post('profile', 'FrontendController@postEditUser')->name('edit');
Route::get('category/{id}/{slug}.html', 'FrontendController@getCategory');
Route::get('tim-kiem.html', 'FrontendController@search')->name('search');
Route::get('detail/{id}/{slug}.html', 'FrontendController@getDetailProduct');
Route::get('quantity/{id}/{color}/{size}', 'FrontendController@getQuanProduct');
Route::get('history', 'FrontendController@history')->middleware('auth');
Route::get('detailorder/{id}', 'FrontendController@detailorder');

Route::get('cate/sortasc/{id}/{slug}.html', 'FrontendController@sortAsc');
Route::get('cate/sortdesc/{id}/{slug}.html', 'FrontendController@sortDesc');

Route::get('myform', 'CartController@pay');
Route::post('select-ajax', ['as' => 'select-ajax', 'uses' => 'CartController@selectAjax']);

Route::get('success/{code}', 'FrontendController@getSuccess')->name('success');
Route::get('ordersearch', 'FrontendController@getOrderSearch')->name('tra-cuu-don-hang');
Route::get('searchbill', 'FrontendController@searchBill')->name('searchbill');
//Route::get('ordersearchResult', 'FrontendController@getOrderSearchResult');
Route::group(['prefix' => 'cart'], function () {
    Route::post('/', 'CartController@addToCart');
    Route::get('show', 'CartController@getShowCart')->name('cart.show');
    Route::get('pay', 'CartController@pay');
    Route::post('pay', 'CartController@checkout');
    Route::get('delete/{id}', 'CartController@getDeleteCart');
    Route::get('update', 'CartController@getUpdateCart');
});
Route::post('/coupon', 'CouponController@store')->name('coupon.store');
Route::delete('/coupon', 'CouponController@destroy')->name('coupon.destroy');

Route::group(['prefix' => 'wishlist'], function () {
    Route::get('/', 'WishlistController@index');
    Route::post('add', 'WishlistController@store');
    Route::get('destroy/{id}', 'WishlistController@destroy');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('delete/image/{id}', 'ProductController@deleteImg');

    Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::get('/logout', 'AuthAdmin\LoginController@logout')->name('admin.logout');

    Route::get('/password/reset', 'AuthAdmin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/email', 'AuthAdmin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset/{token}', 'AuthAdmin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset', 'AuthAdmin\ResetPasswordController@reset');

    Route::get('list', 'AdminController@getList');
    Route::get('add', 'AdminController@getAdd');
    Route::post('add', 'AdminController@postAdd');
    Route::get('user/list', 'AdminController@getListUser');
    Route::get('edit/{id}', 'AdminController@getEditAdmin');
    Route::post('edit/{id}', 'AdminController@postEditAdmin');
    Route::get('delete/{id}', 'AdminController@getDeleteAdmin');
    Route::get('user/delete/{id}', 'AdminController@getDeleteUser');


    Route::group(['prefix' => 'category'], function () {
        Route::get('/', 'CategoryController@getCate');
        Route::post('/', 'CategoryController@postCate');
        Route::get('edit/{id}', 'CategoryController@getEditCate');
        Route::post('edit/{id}', 'CategoryController@postEditCate');
        Route::get('delete/{id}', 'CategoryController@getDeleteCate');
    });

    Route::group(['prefix' => 'coupon'], function () {
        Route::get('/', 'AdminCouponController@getCoupon');
        Route::post('/', 'AdminCouponController@postCoupon');
        Route::get('delete/{id}', 'AdminCouponController@getDeleteCoupon');
    });

    Route::group(['prefix' => 'size'], function () {
        Route::get('/', 'SizeController@getSize');
        Route::post('/', 'SizeController@postSize');
        Route::get('edit/{id}', 'SizeController@getEditSize');
        Route::post('edit/{id}', 'SizeController@postEditSize');
        Route::get('delete/{id}', 'SizeController@getDeleteSize');
    });

    Route::group(['prefix' => 'color'], function () {
        Route::get('/', 'ColorController@getColor');
        Route::post('/', 'ColorController@postColor');
        Route::get('edit/{id}', 'ColorController@getEditColor');
        Route::post('edit/{id}', 'ColorController@postEditColor');
        Route::get('delete/{id}', 'ColorController@getDeleteColor');
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('/', 'ProductController@getProduct');
        Route::get('add', 'ProductController@getAddProduct');
        Route::post('add', 'ProductController@postAddProduct');
        Route::get('edit/{id}', 'ProductController@getEditProduct');
        Route::post('edit/{id}', 'ProductController@postEditProduct');
////            Route::get('detail/{id}', 'ProductController@getDetailProduct');
        Route::get('delete/{id}', 'ProductController@getDeleteProduct');
        Route::get('category/{id}/{slug}.html', 'ProductController@filter');
        Route::get('searchprod', 'ProductController@searchprod')->name('searchprod');

    });

    Route::group(['prefix' => 'order'], function () {
        Route::get('/', 'OrderController@index')->name('order');
        Route::get('delete/{id}', 'OrderController@destroy')->name('del-order');
        Route::get('edit/{id}', 'OrderController@edit')->name('edit-order');
        Route::post('edit/{id}', 'OrderController@update');
        Route::get('status/{id}', 'OrderController@filter');
        Route::get('searchorder', 'OrderController@searchorder')->name('searchorder');
    });

    Route::group(['prefix' => 'thongke'], function () {
        Route::get('order', 'ThongKeController@thongKeOrder');
        Route::get('product', 'ThongKeController@thongKeProduct');
        Route::get('doanhthu', 'ThongKeController@thongKeDoanhThu');

    });
});
