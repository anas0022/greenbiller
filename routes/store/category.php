<?php

use App\Http\Controllers\store\category\CategoryDeleteController;
use App\Http\Controllers\store\category\CategoryListController;


Route::get('/category', [CategoryListController::class, 'category'])->name('store_category');
Route::post('/category_post', [CategoryListController::class, 'categorypost'])->name('store_category.post');
Route::post('/catstatusupdate', [CategoryListController::class, 'updateStatus_cat'])->name('store_updateStatus.cat');
Route::post('/cat_delete', [CategoryDeleteController::class, 'cat_delte'])->name('store_category.delete');
Route::post('/cat_update', [CategoryListController::class, 'cat_update'])->name('store_category.edit');