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

// Route::get('/', function () {
//     echo "<h1>Start .............   Hello Bangladesh</h1>";
// });



/*
|--------------------------------------------------------------------------
| Home Routes
|--------------------------------------------------------------------------
|
| Here contains All Home Routes File
|
*/

Route::get('adminpanel/', 'HomeController@index')->name('adminpanel_dashboard');;





/*
|--------------------------------------------------------------------------
| Admin Routes   **********************************************************
|--------------------------------------------------------------------------
|
| Here contains All Seller Routes File
|
*/

Route::group(['prefix'=>'admins','as'=>'admin.'], function(){

    Route::get('/login', ['as' => 'login', 'uses' => 'AdminController@login'])->name('admin_login');
    
    Route::post('/login/post', ['as' => 'login', 'uses' => 'AdminController@login_post'])->name('admin_login_post');

    Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'AdminController@dashboard'])->name('admin_dashboard');



    Route::get('/forgotten', ['as' => 'forgotten', 'uses' => 'AdminController@forgotten_password'])->name('admin_forgotten_password');

    Route::post('/send/otp', ['as' => 'otp', 'uses' => 'AdminController@send_otp'])->name('admin_send_otp');

    Route::get('/send/otp', ['as' => 'send_otp', 'uses' => 'AdminController@otp_updata'])->name('admin_otp');

    Route::post('/otp/check', ['as' => 'otp_check', 'uses' => 'AdminController@otp_check'])->name('admin_otp_check');

    Route::get('/password/reset', ['as' => 'pass_reset', 'uses' => 'AdminController@password_reset'])->name('admin_reset_pass');

    Route::post('/password/newpassword', ['as' => 'newpassword', 'uses' => 'AdminController@new_password'])->name('admin_new_pass');


    // Category Settings Route    **********************

    Route::get('/category/create', ['uses' => 'CategoryController@create'])->name('category_create');

    Route::post('/category/create/store', ['uses' => 'CategoryController@store'])->name('category_create_store');
   
    Route::get('/categories', [ 'uses' => 'CategoryController@index'])->name('category_all');
    
    Route::get('/category/edit/{id}', [ 'uses' => 'CategoryController@edit'])->name('category_edit');
    
    Route::post('/category/update/{id}', ['uses' => 'CategoryController@update'])->name('category_update');

    Route::get('/category/view/{id}', ['uses' => 'CategoryController@show'])->name('category_show');
    
    Route::get('/category/delete/{id}', [ 'uses' => 'CategoryController@destroy'])->name('category_destroy');



    // Brand Settings Route    **********************

    Route::get('/brand/create', ['uses' => 'BrandController@create'])->name('brand_create');

    Route::post('/brand/create/store', ['uses' => 'BrandController@store'])->name('brand_create_store');
    
    Route::get('/brands', [ 'uses' => 'BrandController@index'])->name('brand_all');
    
    Route::get('/brand/edit/{id}', [ 'uses' => 'BrandController@edit'])->name('brand_edit');
    
    Route::post('/brand/update/{id}', ['uses' => 'BrandController@update'])->name('brand_update');

    Route::get('/brand/view/{id}', ['uses' => 'BrandController@show'])->name('brand_show');
    
    Route::get('/brand/delete/{id}', [ 'uses' => 'BrandController@destroy'])->name('brand_destroy');


        // Mobile Category Settings Route    **********************

        Route::get('/mobileCategory/create', ['uses' => 'MobileCategoryController@create'])->name('mobileCategory_create');

        Route::get('mobiles', ['uses' => 'MobileCategoryController@index'])->name('mobileCategory_all');

        Route::post('/mobileCategory/create/store', ['uses' => 'MobileCategoryController@store'])->name('mobileCategory_create_store');

        Route::post('/mobileCategory/ajax/brands', ['uses' => 'MobileCategoryController@brands'])->name('ajax_brands');

        Route::get('/mobileCategory/edit/{id}', [ 'uses' => 'MobileCategoryController@edit'])->name('mobileCategory_edit');
    
        Route::post('/mobileCategory/update/{id}', ['uses' => 'MobileCategoryController@update'])->name('mobileCategory_update');

        Route::get('/mobileCategory/view/{id}', ['uses' => 'MobileCategoryController@show'])->name('mobileCategory_show');
        
        Route::get('/mobileCategory/delete/{id}', [ 'uses' => 'MobileCategoryController@destroy'])->name('mobileCategory_destroy');

        //    Mobile Category Orders 

        Route::get('/mobileCategory/latest/orders','MobileCategoryMaster@mobile_category_latest_order')->name('mobileCategory_latest_order');

        Route::post('/update/order/status','MobileCategoryMaster@generic_update_order_status')->name('generic_update_order_status');


    // Seller Settings Route    **********************

    Route::get('/seller/create', ['as' => 'seller_create', 'uses' => 'AdminController@create'])->name('admin_seller_create');

    Route::post('/seller/create/store', ['as' => 'seller_create_store', 'uses' => 'AdminController@store'])->name('admin_seller_create_store');
   
    Route::get('/sellers', ['as' => 'seller_all', 'uses' => 'AdminController@all'])->name('admin_seller_all');
    
    Route::get('/seller/edit/{id}', ['as' => 'seller_edit', 'uses' => 'AdminController@edit'])->name('admin_seller_edit');
    
    Route::post('/seller/update/{id}', ['as' => 'seller_update', 'uses' => 'AdminController@update'])->name('admin_seller_update');

    Route::get('/seller/view/{id}', ['as' => 'seller_view', 'uses' => 'AdminController@show'])->name('admin_seller_show');
    
    Route::get('/seller/delete/{id}', ['as' => 'seller_destroy', 'uses' => 'AdminController@destroy'])->name('admin_seller_destroy');


    
    // Admin Settings Route    **********************
    Route::get('/settings', ['as' => 'admin_settings', 'uses' => 'AdminController@admin_settings'])->name('admin_settings');
  
    Route::post('/settings/info', ['as' => 'admin_info', 'uses' => 'AdminController@info'])->name('admin_settings_info');
   
    Route::post('/settings/change_pass', ['as' => 'admin_change_pass', 'uses' => 'AdminController@change_pass'])->name('admin_change_pass');
    
    Route::post('/settings/change_phone', ['as' => 'admin_change_phone', 'uses' => 'AdminController@change_phone'])->name('admin_change_phone');

    Route::get('/logout', ['as' => 'admin_logout', 'uses' => 'AdminController@logout'])->name('admin_logout');



    

});









/*
|--------------------------------------------------------------------------
| Seller Routes   *********************************************************
|--------------------------------------------------------------------------
|
| Here contains All Seller Routes File 
|
*/

Route::group(['prefix'=>'sellers','as'=>'seller.'], function(){


    Route::get('/login', ['as' => 'login', 'uses' => 'SellerController@login'])->name('seller_login');

    Route::post('/login/post', ['as' => 'login', 'uses' => 'SellerController@login_post'])->name('seller_login_post');
   
    Route::get('/forgotten', ['as' => 'forgotten', 'uses' => 'SellerController@forgotten_password'])->name('seller_forgotten_password');
   
    Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'SellerController@dashboard'])->name('seller_dashboard');
   
    Route::post('/send/otp', ['as' => 'otp', 'uses' => 'SellerController@send_otp'])->name('seller_send_otp');

    Route::get('/send/otp', ['as' => 'send_otp', 'uses' => 'SellerController@otp_updata'])->name('seller_otp');

    Route::post('/otp/check', ['as' => 'otp_check', 'uses' => 'SellerController@otp_check'])->name('seller_otp_check');

    Route::get('/password/reset', ['as' => 'pass_reset', 'uses' => 'SellerController@password_reset'])->name('seller_reset_pass');

    Route::post('/password/newpassword', ['as' => 'newpassword', 'uses' => 'SellerController@new_password'])->name('seller_new_pass');



    // Customer Settings Route    **********************

    Route::get('/customer/create', ['as' => 'customer_create', 'uses' => 'SellerController@create'])->name('seller_seller_create');

    Route::post('/customer/create/store', ['as' => 'customer_create_store', 'uses' => 'SellerController@store'])->name('seller_seller_create_store');
   
    Route::get('/customers', ['as' => 'customer_all', 'uses' => 'SellerController@all'])->name('seller_seller_all');
    
    Route::get('/customer/edit/{id}', ['as' => 'customer_edit', 'uses' => 'SellerController@edit'])->name('seller_seller_edit');
    
    Route::post('/customer/update/{id}', ['as' => 'customer_update', 'uses' => 'SellerController@update'])->name('seller_seller_update');

    Route::get('/customer/view/{id}', ['as' => 'customer_view', 'uses' => 'SellerController@show'])->name('seller_seller_show');
    
    Route::get('/customer/delete/{id}', ['as' => 'customer_destroy', 'uses' => 'SellerController@destroy'])->name('seller_seller_destroy');


    // Seller  Settings Route    **********************

    Route::get('/settings', ['as' => 'seller_settings', 'uses' => 'SellerController@seller_settings'])->name('seller_settings');
    
    Route::post('/settings/info', ['as' => 'seller_info', 'uses' => 'SellerController@info'])->name('seller_settings_info');

    Route::post('/settings/change_pass', ['as' => 'seller_change_pass', 'uses' => 'SellerController@change_pass'])->name('seller_change_pass');
    
    Route::post('/settings/change_phone', ['as' => 'seller_change_phone', 'uses' => 'SellerController@change_phone'])->name('seller_change_phone');

    Route::get('/logout', ['as' => 'seller_logout', 'uses' => 'SellerController@logout'])->name('seller_logout');





});




/*
|--------------------------------------------------------------------------
| Website Public Route    *********************************************************
|--------------------------------------------------------------------------
|
| Here contains All  Website Public Route 
|
*/



// Display Swap Product Based On Category, Model , Brand and Etc    **********************

Route::get('/','MobileCategoryMaster@index')->name('home');

Route::get('/sell/{category}','MobileCategoryMaster@single_category')->name('single_category');

Route::get('/sell/{category}/{brand}','MobileCategoryMaster@single_brand')->name('single_brand');

Route::get('/sell/{category}/{brand}/{product}','MobileCategoryMaster@single_product')->name('single_product');

Route::get('/sell/get_value/{category}/{brand}/{product}','MobileCategoryMaster@single_product_get_value')->name('single_product_get_value');




Route::post('/sell/get_value','MobileCategoryMaster@get_val')->name('get_val');

Route::any('/sell/get_exact_value/place_request/{category}/{brand}/{product}','MobileCategoryMaster@get_more_info_send_sms')->name('get_more_info_send_sms');


Route::post("sell/mobile/order/success",'MobileCategoryMaster@mobile_order_success')->name('mobile_order_success');

Route::any("placed/sell/order/success",'MobileCategoryMaster@successfully_place_order')->name('successfully_place_order');