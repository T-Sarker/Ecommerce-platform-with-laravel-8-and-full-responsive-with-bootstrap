<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubadminController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\ProductController;
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

Route::prefix('admin')->group(function(){

    Route::view('/login','admin/auth/login');
    Route::view('/404','admin/404');

    Route::post('/login',[AdminController::class,'login'])->name('login');

    Route::middleware(['auth:admin'])->group(function(){
        Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
        Route::get('/logout',[AdminController::class,'logout'])->name('logout');

        /*
         * this route group holds all the routes for permissions activities
         *this url will be like /admin/permissions/___
         */
        Route::prefix('permission')->group(function(){
            Route::get('/add',[PermissionController::class,'index'])->name('permission.add');
            Route::post('/store',[PermissionController::class,'store'])->name('permission.store');
            Route::get('/show',[PermissionController::class,'show'])->name('permission.show');
            Route::get('/delete/{id}',[PermissionController::class,'destroy'])->name('permission.delete');
        });

        /*
         * this route group holds all the routes for role activities
         *this url will be like /admin/role/___
         */
        Route::prefix('role')->group(function(){
            Route::get('/add',[RoleController::class,'index'])->name('role.add');
            Route::get('/show',[RoleController::class,'show'])->name('role.show');
            Route::post('/store',[RoleController::class,'store'])->name('role.store');
            Route::get('/edit/{role}',[RoleController::class,'edit'])->name('role.edit');
            Route::post('/update',[RoleController::class,'update'])->name('role.update');
            Route::get('/delete/{role}',[RoleController::class,'destroy'])->name('role.delete');
        });

        Route::prefix('subadmin')->group(function(){
            Route::get('/add',[SubadminController::class,'index'])->name('subadmin.add');
            Route::post('/store',[SubadminController::class,'store'])->name('subadmin.store');
            Route::get('/show',[SubadminController::class,'show'])->name('subadmin.show');
            Route::get('/edit/{id}',[SubadminController::class,'edit'])->name('subadmin.edit');
            Route::post('/update',[SubadminController::class,'update'])->name('subadmin.update');
            Route::get('/delete/{id}',[SubadminController::class,'destroy'])->name('subadmin.delete');
        });

        Route::prefix('category')->group(function(){
            Route::get('/add',[CategoryController::class,'index'])->name('category.add');
            Route::post('/store',[CategoryController::class,'store'])->name('category.store');
            Route::get('/show',[CategoryController::class,'show'])->name('category.show');
            Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
            Route::post('/update',[CategoryController::class,'update'])->name('category.update');
            Route::get('/delete/{id}',[CategoryController::class,'destroy'])->name('category.delete');
        });

        Route::prefix('brand')->group(function(){
            Route::get('/add',[BrandsController::class,'index'])->name('brand.add');
            Route::post('/store',[BrandsController::class,'store'])->name('brand.store');
            Route::get('/show',[BrandsController::class,'show'])->name('brand.show');
            Route::get('/edit/{id}',[BrandsController::class,'edit'])->name('brand.edit');
            Route::post('/update',[BrandsController::class,'update'])->name('brand.update');
            Route::get('/delete/{id}',[BrandsController::class,'destroy'])->name('brand.delete');
        });

        Route::prefix('product')->group(function(){
            Route::get('/add',[ProductController::class,'index'])->name('product.add');
            Route::get('/category/{id}',[ProductController::class,'getBrands']);
            Route::post('/store',[ProductController::class,'store'])->name('product.store');
        });
    });
});
