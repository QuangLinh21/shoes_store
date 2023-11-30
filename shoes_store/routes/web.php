<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImgProductController;
use App\Http\Controllers\NewController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Models\CategoryModel;
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
//     return view('layout_user.page_user.home');
// });
Route::get('/',[HomeController::class,'index']);
Route::get('logout_admin',[AdminController::class,'logout_admin']);
Route::post('admin_login',[AdminController::class,'admin_login']);
Route::resource('dashboard','App\Http\Controllers\AdminController');
Route::get('admin',[AdminController::class,'admin']);

//brand
Route::resource('brand','App\Http\Controllers\BrandController');
Route::get('delete_brand/{brand_id}',[BrandController::class,'delete_brand']);
Route::get('/active-brand/{brand_id}',[BrandController::class,'active_brand']);
Route::get('/unactive-brand/{brand_id}',[BrandController::class,'unactive_brand']);
//category
Route::resource('category','App\Http\Controllers\CategoryController');
Route::get('/active-cate/{cate_id}',[CategoryController::class,'active_cate']);
Route::get('/unactive-cate/{cate_id}',[CategoryController::class,'unactive_cate']);
Route::get('delete_cate/{cate_id}',[CategoryController::class,'del']);
//product
Route::resource('product','App\Http\Controllers\ProductController');
Route::get('/active_product/{product_id}',[ProductController::class,'active_cate']);
Route::get('/delete_product/{product_id}',[ProductController::class,'del']);
Route::get('delete_cate/{cate_id}',[CategoryController::class,'del']);
Route::resource('img_product','App\Http\Controllers\ImgProductController');
Route::get('delete_img_pro/{img_pro_id}',[ImgProductController::class,'del']);
Route::get('/active_product_img/{img_pro_id}',[ImgProductController::class,'active_cate']);
Route::get('/unactive_product_img/{img_pro_id}',[ImgProductController::class,'unactive_cate']);
Route::get('/active_hot/{product_id}',[ProductController::class,'active_hot']);
Route::get('/unactive_hot/{product_id}',[ProductController::class,'unactive_hot']);
Route::post('search',[ProductController::class,'search']);
Route::get('home/{product_id}',[HomeController::class,'show'])->name('home.show');
//kho hàng
Route::get('quantity_product',[ProductController::class,'quantity_product']);
Route::get('add_quantity',[ProductController::class,'add_quantity']);
Route::post('update_kho_product',[ProductController::class,'update_kho_product']);
Route::get('plus_product/{kho_id}',[ProductController::class,'plus_product']);
Route::post('plus_kho_product/{kho_id}',[ProductController::class,'plus_kho_product']);

Route::post('add_to_cart',[CartController::class,'add_to_cart']);
Route::get('update_cart_qty/{rowId}',[CartController::class,'update_cart_qty']);
Route::post('update_size',[CartController::class,'update_size']);
Route::get('delete_cart_item/{rowId}',[CartController::class,'delete_cart_item']);
//news
Route::resource('news','App\Http\Controllers\NewController');
Route::get('/active-new/{new_id}',[NewController::class,'active_cate']);
Route::get('/unactive-new/{new_id}',[NewController::class,'unactive_cate']);
Route::get('delete_new/{new_id}',[NewController::class,'del']);
Route::get('show_new',[NewController::class,'show_new']);


//-------------------------------------frontend----------------------------------
Route::resource('home','App\Http\Controllers\HomeController');
Route::get('contact',[HomeController::class,'contact']);
Route::post('send_contact',[HomeController::class,'send_contact']);
Route::get('filter_brand',[BrandController::class,'filter_brand']);
Route::get('filter_category',[CategoryController::class,'filter_category']);
Route::resource('cart','App\Http\Controllers\CartController');
Route::get('show_cart',[CartController::class,'show_cart']);


//Customer
Route::resource('customer','App\Http\Controllers\AccountController');
Route::get('login_acc',[AccountController::class,'login_acc']);
Route::post('login_user',[AccountController::class,'login_user']);
Route::get('checkout_user',[AccountController::class,'checkout_user']);
Route::get('payment',[AccountController::class,'payment']);
Route::get('about_user',[AccountController::class,'about_user']);
Route::get('show_order_user/{order_id}',[AccountController::class,'show_order_user']);

//payment
Route::resource('payments','App\Http\Controllers\PaymentController');
Route::get('delete_address_user/{ship_id}',[PaymentController::class,'delete_address_user']);
Route::post('payment_bill',[PaymentController::class,'payment_bill']);
Route::get('admin_payment',[PaymentController::class,'admin_payment']);
Route::post('payment_vnpay',[PaymentController::class,'payment_vnpay']);
Route::get('delete_paymethod/{pay_id}',[PaymentController::class,'delete_paymethod']);
Route::get('active_paymethod/{pay_id}',[PaymentController::class,'active_paymethod']);
Route::get('unactive_paymethod/{pay_id}',[PaymentController::class,'unactive_paymethod']);
Route::get('vnpay_callback',[PaymentController::class,'vnpay_callback'])->name('vnpay_callback');;
Route::get('admin_bill',[AdminController::class,'admin_bill']);
Route::get('admin_bill_success',[AdminController::class,'admin_bill_success']);
Route::get('remove_order/{order_id}',[AdminController::class,'remove_order']);
Route::get('bill_detail/{order_id}',[AdminController::class,'bill_detail']);
Route::get('xuatbill/{order_id}',[AdminController::class,'xuatbill']);

//
Route::get('order_total',[AdminController::class,'order_total']);

