<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//user route
Route::get('/', [UserController::class, 'home'])->name('index');
Route::get('/product_details/{id}', [UserController::class, 'productDetails'])->name('product_details');
Route::get('/allproduct', [UserController::class, 'viewAllProducts'])->name('viewallproducts');
Route::get('/dashboard',[UserController::class, 'index'] )->middleware(['auth',
    'verified'])->name('dashboard');
Route::post('/addtocart/{id}',[UserController::class, 'addToCart'] )->middleware(['auth',
    'verified'])->name('addtocart');
    Route::get('/cartproduct', [UserController::class, 'cartProduct'])->middleware(['auth',
    'verified'])->name('cartProduct');
Route::post('/removecartproduct/{id}', [UserController::class, 'removeCartProduct'])->middleware(['auth',
    'verified'])->name('removecartproduct');
Route::post('/confirmorder', [UserController::class, 'confirmOrder'])->middleware(['auth',
    'verified'])->name('confirm_order');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('admin')->group(function () {
     Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    Route::get('/add_category', [AdminController::class, 'addCategory'])->name('admin.addcategory');
    Route::post('/add_category', [AdminController::class, 'postAddCategory'])->name('admin.postaddcategory');
    Route::get('/view_category', [AdminController::class, 'viewcategory'])->name('admin.viewcategory');
    Route::get('/delete_category/{id}', [AdminController::class, 'deletecategory'])->name('admin.categorydelete');
    Route::get('/update_category/{id}', [AdminController::class, 'updatecategory'])->name('admin.categoryupdate');
    Route::post('/update_category/{id}', [AdminController::class, 'postUpdateCategory'])->name('admin.postupdatecategory');

    //product route
    Route::get('/add_product', [AdminController::class, 'addProduct'])->name('admin.addproduct');
    Route::post('/add_product', [AdminController::class, 'postAddProduct'])->name('admin.postaddproduct');
    Route::get('/view_product', [AdminController::class, 'viewProduct'])->name('admin.viewproduct');
    Route::get('/delete_product/{id}', [AdminController::class, 'deleteProduct'])->name('admin.deleteproduct');
    Route::get('/update_product/{id}', [AdminController::class, 'updateProduct'])->name('admin.updateproduct');
    Route::post('/update_product/{id}', [AdminController::class, 'postUpdateProduct'])->name('admin.postupdateproduct');
    //order route
    Route::get('/view_order', [AdminController::class, 'viewOrder'])->name('admin.vieworder');
   Route::post('/change_status/{id}', [AdminController::class, 'changeStatus'])->name('admin.changestatus');
});
require __DIR__.'/auth.php';
