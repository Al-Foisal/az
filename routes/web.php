<?php

use App\Http\Controllers\CategoryControllerController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductController;
use App\Models\Message;
use App\Models\SiteSetting;
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
Route::get('/', [

    'uses' => 'App\Http\Controllers\FrontendController@index',
    'as'   => '/',

]);
Route::get('/product-details/{slug?}', [

    'uses' => 'App\Http\Controllers\FrontendController@product_details',
    'as'   => 'product-details',

]);
Route::get('/category-products/{slug}', [

    'uses' => 'App\Http\Controllers\FrontendController@category',
    'as'   => 'category-products',

]);
Route::get('/about-us', [

    'uses' => 'App\Http\Controllers\FrontendController@about',
    'as'   => 'about-us',

]);
Route::get('/Privacy', [

    'uses' => 'App\Http\Controllers\FrontendController@Privacy',
    'as'   => 'Privacy',

]);
Route::get('/Terms-&-condition', [

    'uses' => 'App\Http\Controllers\FrontendController@terms',
    'as'   => 'Terms-&-condition',

]);
Route::get('/contact-us', [

    'uses' => 'App\Http\Controllers\FrontendController@contact',
    'as'   => 'contact-us',

]);
Route::get('/search-products', [

    'uses' => 'App\Http\Controllers\FrontendController@search',
    'as'   => 'search-products',

]);
/******************************************************* cart route ********************************************************* */
Route::post('/add-to-cart', [

    'uses' => 'App\Http\Controllers\FrontendController@cart_add',
    'as'   => 'add-to-cart',

]);

Route::get('/add-cart/{id?}', [

    'uses' => 'App\Http\Controllers\FrontendController@add_cart',
    'as'   => 'add-cart',

]);
Route::get('/cart-products', [

    'uses' => 'App\Http\Controllers\FrontendController@cart',
    'as'   => 'cart-products',

]);
Route::post('/cart-update', [

    'uses' => 'App\Http\Controllers\FrontendController@cart_update',
    'as'   => 'cart-update',

]);
Route::post('/remove-cart', [

    'uses' => 'App\Http\Controllers\FrontendController@remove_cart',
    'as'   => 'remove-cart',

]);

Route::get('/billing', [

    'uses' => 'App\Http\Controllers\FrontendController@billing',
    'as'   => 'billing',

]);

Route::post('/order-save', [FrontendController::class, 'orderSave'])->name('orderSave');
Route::get('/confirm-payment', [FrontendController::class, 'confirmPayment'])->name('confirmPayment');
/******************************************************** resigter login custome ********************************************* */
Route::post('/customer-resigter', [

    'uses' => 'App\Http\Controllers\CustomerController@resigter',
    'as'   => 'customer-resigter',

]);
Route::get('/customer-profile', [

    'uses' => 'App\Http\Controllers\FrontendController@profile',
    'as'   => 'customer-profile',

]);
Route::get('/order-track', [

    'uses' => 'App\Http\Controllers\FrontendController@track',
    'as'   => 'order-track',

]);
Route::get('/customer-resigter', [

    'uses' => 'App\Http\Controllers\FrontendController@resigter',
    'as'   => 'customer-resigter',

]);
Route::get('/customer-login', [

    'uses' => 'App\Http\Controllers\FrontendController@login',
    'as'   => 'customer-login',

]);
Route::post('/customer-login1', [

    'uses' => 'App\Http\Controllers\CustomerController@login',
    'as'   => 'customer-login1',

]);
Route::get('/customer-logout', [

    'uses' => 'App\Http\Controllers\CustomerController@logout',
    'as'   => 'customer-logout',

]);
Route::post('/customer-message', [

    'uses' => 'App\Http\Controllers\AdminController@message1',
    'as'   => 'customer-message',

]);
/******************************************************* cart route ********************************************************* */

/* admin route */
Route::resource('categorys', CategoryControllerController::class)->middleware([
    'auth:sanctum', 'verified',
]);
Route::resource('products', ProductController::class)->middleware([
    'auth:sanctum', 'verified',
]);
Route::get('/orders', [

    'uses' => 'App\Http\Controllers\AdminController@orders',
    'as'   => 'orders',

]);
Route::post('/send-message', [

    'uses' => 'App\Http\Controllers\AdminController@send_message',
    'as'   => 'send-message',

]);

Route::get('/message-view/{id?}', [

    'uses'       => 'App\Http\Controllers\AdminController@message',
    'as'         => 'message-view',
    'middleware' => ['auth:sanctum', 'verified'],
]);
Route::post('/delete-message', [

    'uses'       => 'App\Http\Controllers\AdminController@delete_message',
    'as'         => 'delete-message',
    'middleware' => ['auth:sanctum', 'verified'],
]);

Route::get('/data-manege', [

    'uses'       => 'App\Http\Controllers\AdminController@data_manage',
    'as'         => 'data-manege',
    'middleware' => ['auth:sanctum', 'verified'],
]);
Route::get('/all-page-containt-and-menu', [

    'uses'       => 'App\Http\Controllers\AdminController@allpage',
    'as'         => 'all-page-containt-and-menu',
    'middleware' => ['auth:sanctum', 'verified'],
]);

Route::get('/Site-setting', [

    'uses'       => 'App\Http\Controllers\AdminController@siteSetting',
    'as'         => 'Site-setting',
    'middleware' => ['auth:sanctum', 'verified'],
]);

Route::post('/add-siteInfo', [

    'uses'       => 'App\Http\Controllers\SiteSettingController@add_site_setting',
    'as'         => 'add-siteInfo',
    'middleware' => ['auth:sanctum', 'verified'],
]);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard', [
            'site'    => SiteSetting::first(),
            'message' => Message::orderBy('id', 'desc')->get(),
        ]);
    })->name('dashboard');
});
