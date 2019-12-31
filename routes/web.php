<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'IndexController')->name('index');
Route::get('product', 'ProductController@index')->name('all.product');
Route::get('product/{productSlug}', 'ProductController@show')->name('single.product');
Route::post('product', 'ProductController@search')->name('search.product');
Route::get('favorite/{productId}', 'ProductController@favoriteProduct')->name('favorite.product');
Route::post('review/{productId}', 'ProductController@reviewProduct')->name('review.product');
Route::get('about', 'PageController@about')->name('about');
Route::get('service', 'PageController@service')->name('service');
Route::get('contact', 'PageController@contact')->name('contact');
Route::post('contact', 'PageController@sendContact')->name('contact.send');
Route::get('addtocart/{productId}', 'CartController@add')->name('cart.add');
Route::get('removetocart/{cartKey}', 'CartController@remove')->name('cart.remove');
Route::get('addtocart', 'CartController@show');
Route::get('checkout', 'CheckoutController@index')->name('checkout');
Route::get('payment', 'OrderController@payment')->name('payment');
Route::post('payment', 'OrderController@processPayment')->name('payment.process');
Route::get('login', 'LoginRegisterController@index')->name('login.register');
Route::post('login', 'LoginRegisterController@login')->name('login.login');
Route::get('logout', 'LoginRegisterController@logout')->name('login.logout');

Route::prefix('admin')->group(function () {
    Auth::routes(['register' => false]);
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('category', 'Admin\CategoryController');
    Route::resource('product', 'Admin\ProductController');
});

