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
// WishlistController

Route::get('add/wishlist/{product_id}', 'WishlistController@addwishlist');
// CommentController
Route::post('comment/post', 'CommentController@commentpost');
Route::get('comment/list', 'CommentController@commentlist');
// BlogController
Route::get('add/blog', 'BlogController@addblog');
Route::post('add/blog/post', 'BlogController@addblogpost');
Route::get('blog/list', 'BlogController@bloglist');
Route::get('update/blog/{blog_id}', 'BlogController@updateblog');
Route::post('update/blog/post', 'BlogController@updateblogpost');
Route::get('delete/blog/{blog_id}', 'BlogController@deleteblog');

// FaqController
Route::get('add/faq', 'FaqController@addfaq');
Route::post('add/faq/post', 'FaqController@addfaqpost');
Route::get('delete/faq/{faq_id}', 'FaqController@deletefaq');
// AboutController
Route::get('add/about', 'AboutController@addabout');
Route::post('add/about/post', 'AboutController@addaboutpost');
Route::get('view/about/{about_id}', 'AboutController@viewabout');
Route::get('update/about/{about_id}', 'AboutController@updateabout');
Route::post('update/about/post', 'AboutController@updateaboutpost');
Route::get('delete/about/{about_id}', 'AboutController@deleteabout');
// TestmonialController
Route::get('add/testmonial', 'TestmonialController@addtestmonial');
Route::post('add/testmonial/post', 'TestmonialController@addtestmonialpost');
// SliderController
Route::get('add/slider', 'SliderController@addslider');
Route::post('add/slider/post', 'SliderController@addsliderpost');
Route::get('delete/slider/{slider_id}', 'SliderController@deleteslider');
Route::get('update/slider/{slider_id}', 'SliderController@updateslider');
Route::post('update/slider/post', 'SliderController@updatesliderpost');
// StripePaymentController
Route::get('stripe', 'StripePaymentController@stripe');
Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');
// Customar register Controller
Route::get('customar/register', 'Custoram_registerController@customarregister');
Route::post('customar/register/post', 'Custoram_registerController@customarregisterpost');
// Checkout Controller
Route::post('checkout' , 'CheckoutController@index');
Route::post('checkout/post' , 'CheckoutController@checkoutpost');
// Coupon Controller
Route::get('add/coupon' , 'CouponController@addcoupon');
Route::post('add/coupon/post' , 'CouponController@addcouponpost');
// Cart Controller
Route::get('cart', 'CartController@cart');
Route::get('cart/{coupon_name}', 'CartController@cart');
Route::post('add/to/cart', 'CartController@addtocart');
Route::get('cart/delete/{cart_id}', 'CartController@cartdelete');
Route::post('cart/update', 'CartController@cartupdate');
// Product Controller
Route::get('add/product', 'ProductController@addproduct');
Route::post('add/product/post', 'ProductController@addproductpost');
Route::get('update/product/{product_id}', 'ProductController@updateproduct');
Route::post('update/product/post', 'ProductController@updateproductpost');
Route::get('delete/product/{product_id}', 'ProductController@deleteproduct');
// Contact controller
Route::get('message/list', 'ContactController@messagelist');
Route::post('contact/post', 'ContactController@contactpost');
Route::get('contact/info', 'ContactController@contactinfo');
Route::post('contact/info/post', 'ContactController@contactinfopost');
Route::get('contact/view/{contact_id}', 'ContactController@contactview');
Route::get('contact/delete/{contact_id}', 'ContactController@contactdelete');
// FrontendController
Route::get('/','FrontendController@index');
Route::get('about','FrontendController@about');
Route::get('contact','FrontendController@contact');
Route::get('product/details/{product_id}', 'FrontendController@productdetails');
Route::get('shop', 'FrontendController@shop');
Route::get('faq', 'FrontendController@faq');
Route::get('blog', 'FrontendController@blog');
Route::get('blog/details/{blog_id}', 'FrontendController@blogdetails');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
//Category Controller
Route::get('/add/category', 'CategoryController@addcategory');
Route::post('/add/category/post', 'CategoryController@addcategorypost');
Route::get('/update/category/{category_id}', 'CategoryController@updatedcategory');
Route::post('/update/category/post', 'CategoryController@updatedcategorypost');
Route::get('/delete/category/{category_id}', 'CategoryController@deletecategory');
Route::get('/restore/category/{category_id}', 'CategoryController@restorecategory');
Route::get('/harddelete/category/{category_id}', 'CategoryController@harddeletecategory');
// Profile Controller
Route::get('profile/edit', 'ProfileController@profileedit');
Route::post('profile/post', 'ProfileController@profilepost');
Route::post('password/post', 'ProfileController@passwordpost');
