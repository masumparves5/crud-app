<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

Route::get('/',[HomeController::class, 'index'])->name("home");
Route::get('/product/add',[ProductController::class, 'index'])->name("product.add");
Route::post('/product/store',[ProductController::class, 'store'])->name("product.store");
Route::get('/product/manage',[ProductController::class, 'menage'])->name("product.manage");


