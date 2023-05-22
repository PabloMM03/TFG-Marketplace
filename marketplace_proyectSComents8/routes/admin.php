<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SalesController;
use App\Http\Controllers\Admin\UserController;

//Admin routes
Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

//Users Path
Route::resource('users', UserController::class)->only(['index', 'edit', 'update', 'destroy'])->names('admin.users');

//Route categories
Route::resource('categories', CategoryController::class)->except('show')->names('admin.categories');

//Route tags
Route::resource('tags', TagController::class)->except('show')->names('admin.tags');

//Route admin product creation
Route::resource('products', ProductController::class)->except('show')->names('admin.products');

//User Roles Path
Route::resource('roles', RoleController::class)->names('admin.roles');

//Route admin sales products
Route::get('sales', [SalesController::class, 'index'])->name('admin.sales.index');
// Route::get('view-sales/{order}', [SalesController::class, 'view'])->name('admin.sales.view');
Route::get('view-sales/{id}', [SalesController::class, 'view'])->name('admin.sales.view');
