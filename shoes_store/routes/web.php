<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImgProductController;
use App\Http\Controllers\NewController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('layout_user.page_user.home');
});
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
//news
Route::resource('news','App\Http\Controllers\NewController');
Route::get('/active-new/{new_id}',[NewController::class,'active_cate']);
Route::get('/unactive-new/{new_id}',[NewController::class,'unactive_cate']);
Route::get('delete_new/{new_id}',[NewController::class,'del']);


//-------------------------------------frontend----------------------------------
Route::resource('hpme','App\Http\Controllers\HomeController');
