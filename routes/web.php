<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Pro;
use App\Http\Controllers\ProductController;
use App\Models\Catogory;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


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
//
Route::get('/login',[AdminController::class, 'login']);
Route::get('/dashboard',[AdminController::class, 'showdashboard']);
Route::post('/dashboard',[AdminController::class,'dashboard']);
Route::get('/logout',[AdminController::class,'logout']);

//category
Route::get('/addcategory',[CategoryProduct::class,'add']);
Route::post('/addcategory',[CategoryProduct::class,'save_category']);
Route::get('/allcategory',[CategoryProduct::class, 'all']);

Route::get('updatecategory/{category_id}',[CategoryProduct::class,'edit_category']);
Route::patch('updatecategory/{category_id}', [CategoryProduct::class,'update_category']);
Route::get('deletecategory/{category_id}',[CategoryProduct::class,'delete_category']);

//brand
Route::get('/addbrand',[BrandProduct::class,'add']);
Route::get('/allbrand',[BrandProduct::class,'all']);
Route::post('/addbrand',[BrandProduct::class,'save_brand']);

Route::get('/allbrand',[BrandProduct::class, 'all']);

Route::get('updatebrand/{brand_id}',[BrandProduct::class,'edit_brand']);
Route::patch('updatebrand/{brand_id}', [BrandProduct::class,'update_brand']);

Route::get('deletebrand/{brand_id}',[BrandProduct::class,'delete_brand']);

//product
Route::get('/addproduct',[ProductController::class,'add']);
Route::get('/allproduct',[ProductController::class,'all']);
Route::post('/addproduct',[ProductController::class,'save_product']);

Route::get('/allproduct',[ProductController::class, 'all']);

Route::get('updateproduct/{product_id}',[ProductController::class,'edit_product']);
Route::patch('updateproduct/{product_id}', [ProductController::class,'update_product']);

Route::get('deleteproduct/{product_id}',[ProductController::class,'delete_product']);

//index client
Route::get('/welcome/',[HomeController::class,'index']);
Route::get('/brands/{brand}/category/{category}',[HomeController::class,'index_pro']);

//danh muc san pham
Route::get('/danh-muc-san-pham/{category_id}',[HomeController::class,'show_category_welcome']);
Route::get('/thuong-hieu-san-pham/{brand_id}',[HomeController::class,'show_brand_welcome']);
Route::get('/chi-tiet-san-pham/{product_id}',[HomeController::class,'detail_product']);
//tìm kiếm sản phẩm
Route::post('/tim-kiem-san-pham',[HomeController::class,'search_product']);
//giỏ hàng
Route::post('/gio-hang',[CartController::class,'save_cart']);
Route::get('/gio-hang',[CartController::class,'show_cart']);



Route::get('/delete-cart/{rowId}',[CartController::class,'delete_cart']);

Route::get('/update-cart-down/{rowId}',[CartController::class,'update_cart_down']);
Route::get('/update-cart-up/{rowId}',[CartController::class,'update_cart_up']);
Route::post('/update-cart-quantity',[CartController::class,'update_cart_quantity']);

Route::post('/update-cart-ajax',[CartController::class,'update_cart_ajax']);
Route::get('/delete-cart-ajax/{session_id}',[CartController::class,'delete_cart_ajax']);


Route::post('/add-cart-ajax',[CartController::class,'add_cart_ajax']);
Route::get('/gio-hang-ajax',[CartController::class,'show_cart_ajax']);

//đăng nhập khách hàng
Route::get('/dang-nhap',[CheckoutController::class,'login']);
Route::post('/dang-nhap',[CheckoutController::class,'check_login']);
Route::get('/dang-xuat',[CheckoutController::class,'logout']);
Route::post('/add-customer',[CheckoutController::class,'add_customer']);
Route::get('/thanh-toan',[CheckoutController::class,'check_out']);
Route::post('/thanh-toan',[CheckoutController::class,'save_check_out']);


Route::get('/phuong-thuc-thanh-toan',[CheckoutController::class,'payment']);
Route::post('/phuong-thuc-thanh-toan',[CheckoutController::class,'save_payment']);

//all order
Route::get('/allorder',[CheckoutController::class,'allorder']);
Route::get('/detail-order/{order_id}',[CheckoutController::class,'orderdetail']);
Route::patch('/update-status/{order_id}',[CheckoutController::class,'update_status']);

Route::get('/detail-order/{order_id}',[AdminController::class,'orderdetail']);

//acc
Route::get('/tai-khoan',[CheckoutController::class,'show_acc']);
Route::patch('update-customer/{product_id}', [CheckoutController::class,'update_customer']);

//lịch sử đơn hàng
Route::get('/lich-su-don-hang/{customer_id}',[CheckoutController::class,'show_list_order']);


Route::get('/lich-su-don-hang-chi-tiet/{order_id}',[CheckoutController::class,'list_order_detail']);

