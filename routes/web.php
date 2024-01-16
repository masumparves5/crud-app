<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

Route::get('/',[HomeController::class, 'index'])->name("home");
Route::get('/product/add',[ProductController::class, 'index'])->name("product.add");
Route::post('/product/store',[ProductController::class, 'store'])->name("product.store");
Route::get('/product/manage',[ProductController::class, 'menage'])->name("product.manage");
Route::get('/product/edit/{id}',[ProductController::class, 'edit'])->name("product.edit");
Route::get('/product/delete/{id}',[ProductController::class, 'delete'])->name("product.delete");
Route::post('/product/update/{id}', [ProductController::class, 'update']) ->name('product.update');


