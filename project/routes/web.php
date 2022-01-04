<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\CateController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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

Route::get('admin/login',[AdminController::class,'login'])->name('admin.login');
Route::get('admin',[AdminController::class,'login'])->name('admin.index');
Route::post('admin/store_login',[AdminController::class,'store_login'])->name('admin.store_login');

Route::get('admin/register',[AdminController::class,'create'])->name('admin.register');
Route::post('admin/store_register',[AdminController::class,'store_register'])->name('admin.store_register');

Route::get('admin/logout',[AdminController::class,'logout'])->name('admin.logout');
Route::post('admin/handleForgot',[AdminController::class,'store_forgot'])->name('admin.store_forgot');
Route::get('admin/forgot',[AdminController::class,'forgot'])->name('admin.forgot');

Route::middleware(['CheckUserLogin','can:view-page-admin'])->group(function() {
    Route::get('manager/index',[ManagerController::class,'index'])->name('manager.index');
    Route::middleware(['can:view-page-admin-manager'])->group(function() {
        Route::get('manager/add_user',[ManagerController::class,'add'])->name('manager.add');
        Route::post('manager/store_add',[ManagerController::class,'store_add'])->name('manager.store_add');
        Route::get('manager/update/{id}',[ManagerController::class,'update'])->name('manager.update');
        Route::post('manager/update_store/{id}',[ManagerController::class,'update_store'])->name('manager.update_store');
        Route::get('manager/delete/{id}',[ManagerController::class,'delete'])->name('manager.delete');
    });


    Route::prefix('manager/cate')->name('manager.cate.')->group(function() {
        Route::get('add',[CateController::class,'add'])->name('add');
        Route::post('store_add',[CateController::class,'store_add'])->name('store_add');
        Route::get('index',[CateController::class,'index'])->name('index');
        Route::get('update/{id}',[CateController::class,'update'])->name('update');
        Route::post('update_store/{id}',[CateController::class,'update_store'])->name('update_store');
        Route::post('changeStatusItem/{id}',[CateController::class,'changeStatusItem'])->name('changeStatusItem');
        Route::get('delete/{id}',[CateController::class,'delete'])->name('delete');

    });

    Route::prefix('manager/product')->name('manager.product.')->group(function() {
        Route::get('add',[ProductController::class,'add'])->name('add');
        Route::post('store_add',[ProductController::class,'store_add'])->name('store_add');
        Route::get('index',[ProductController::class,'index'])->name('index');
        Route::get('update/{id}',[ProductController::class,'update'])->name('update');
        Route::post('update_store/{id}',[ProductController::class,'update_store'])->name('update_store');
        Route::get('delete/{id}',[ProductController::class,'delete'])->name('delete');

    });

    Route::get('manager/order',[OrderController::class,'Order_index'])->name('manager.order');

});

Route::prefix('/')->name('user.')->group(function() {
    Route::get('/',[UserController::class,'homeIndex'])->name('homeIndex');
    Route::get('/detail_product/{id}',[UserController::class,'detailProduct'])->name('detailProduct');
    Route::get('/cate_product/{id?}',[UserController::class,'cate_product'])->name('cate_product');
    Route::get('/add-to-cart/{id}',[UserController::class,'addToCart'])->name('addToCart');
    Route::get('/show_cart',[UserController::class,'show_cart'])->name('show_cart');
    Route::get('/update_cart',[UserController::class,'update_cart'])->name('update_cart');
    Route::get('/delete_cart',[UserController::class,'delete_cart'])->name('delete_cart');
    Route::get('cart_store',[UserController::class,'cart_store'])->name('cart_store');

});

