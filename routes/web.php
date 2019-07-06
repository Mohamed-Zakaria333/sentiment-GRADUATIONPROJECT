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
//=============================================
Route::POST('cart','cart@cart')->name('CART');
Route::GET('cart','cart@cart')->name('CART');
Route::POST('payment','cart@applay_payment')->name('PAYMENT_POST');
Route::GET('payment','cart@show_payment')->name('PAYMENT_GET');
Route::post('/addToCart/product={id}','cart@addToCart')->name('ADD_POST_CART');
Route::get('delete_from_cart/product={id}','cart@del_from_Cart')->name('CART_DELETING');
Route::post('cart_updating','cart@update')->name('CART_UPDATING');

//=============================================











Route::get('/', function () {
    return view('admin.email_template');
});
//==========
// Route::get('/checkout','productController@CHECKOUT')->name('CHECKOUT');
// Route::post('/checkout','productController@CHECKOUT')->name('CHECKOUT');
// Route::get('/payment','productController@PAYMENT')->name('PAYMENT');

//==========


//website routes
//===============================================================================
Route::prefix('/HomePage')->group(function () {
Route::get('','productController@index')->name('Home');
//==========
Route::get('/product={id}','productController@product_details')->name('product_details');
Route::post('/product={id}','productController@submit_comment')->middleware('posting')->name('product_details');
//==========
//==========
// Route::get('cart/payment', function () {r
//     return view('website.payment');
// })->name('payment');
//==========
Route::get('not', function () {
    event(new App\Events\user_comment('mohamed zakaria','katiel'));
return ('check pusher yaris');
});

});
//===============================================================================
//logins_registrations
Route::post('/user_registration', 'customregistration@submit_user')->name('custom_register');
Route::post('/user_login', 'customlogin@user_login')->name('custom_login');
Route::get('/user_logout', 'customlogout@user_logout')->name('custom_logout');
Route::get('/contact_us', 'productController@contact')->name('contact');
Route::get('/about_us', 'productController@about')->name('about');

Route::get('login_user', function () {
    return view('website.loginform');
});
//===============================================================================
//searching
Route::post('/search_results/catagory={cata}','productController@search')->name('searching');


//===============================================================================
//admin routes
// Route::group(['prefix' => '/Dashboard/products',  'middleware' => 'is_admin'], function()
// {
//     Route::get('dashboard', function() {} );
// });


//Route::prefix('/Dashboard/products')->group(
//===============================================================================
Route::group(['prefix' => '/Dashboard/products',  'middleware' => 'is_admin'],function () {
//=======
Route::get('', 'admin@index')->name('Editing');
//=======
Route::get('/newProduct', 'admin@store')->name('Adding');
Route::post('success-stored','admin@store')->name('store-pro');
//=======
Route::get('/editProduct/id={id}', 'admin@edit_pro')->name('modifing');
Route::post('success_modified_product','admin@exe_modifing')->name('exe_modifing');
//=======
Route::get('/delete_product/id={id}','admin@del')->name('delete_pro');
//=======
Route::get('/reviews-analytic/id={id}', 'admin@analysis_page')->name('Analyting');
//=======
Route::get('/send-mail-for/productid={product}/userid={id}','admin@singleMail')->name('Mailing_sv');
Route::post('/send-mail-for/userid={id}','admin@apply_single_send')->name('Mailing_ss');
//=======
Route::get('/send-mails-for-multiple-users/users={num}/productid={product}','admin@multipleMails')->name('Mailing_mv');
Route::post('/send-mails-for-multiple-users','admin@apply_multi_send')->name('Mailing_ms');
//=======
Route::get('/product_Requests','admin@Requests')->name('Requesting');
Route::get('/newProduct', 'admin@add')->name('Adding');
});
//==============================================================
//admin without prefix//adminlogin
Route::get('/Admin_Login', function () {return view('admin.admin_login');})->name('Admin_Login');
Route::post('/Admin_Login','customlogin@admin_login')->name('admin_login');
Route::get('/Admin_Logout','customlogout@admin_logout')->name('admin_logout');

Route::get('/Dashboard/notification', function () { return view('admin.notification');})->name('Notifiying');
//===============================================================




















Route::get('/kk', function () {
    return view('admin.aa');
});
Route::get('/ll', function () {
    return 'fffffffffffffffffffffffffffffffff';
});
Route::post('/ll', function () {
    return 'fffffffffffffffffffffffffffffffff';
});





























































//===============================================================================
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
