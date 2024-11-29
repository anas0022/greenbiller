<?php

use App\Http\Controllers\store\purchase\PurchaseBillController;
use App\Http\Controllers\store\purchase\PurchaseInvoiceController;
use App\Http\Controllers\store\purchase\PurchaseListController;
use App\Http\Controllers\store\purchase\PurchasePostController;

Route::get('/purchase_list', [PurchaseListController::class, 'purchase_list'])->name('store_purchase_list');
Route::get('/new_purchase', [PurchasePostController::class, 'new_purchase'])->name('store_new_purchase');
Route::get('/search-items', [PurchasePostController::class, 'searchItems'])->name('search-items.store');
Route::get('/add-item', [PurchasePostController::class, 'addItem'])->name('add-item.store');
Route::post('/billno_exist', [PurchaseBillController::class, 'billno_exist'])->name('store.billno_exist');
Route::post('/add_purchase', [PurchasePostController::class, 'add_purchase'])->name('store_add_purchase');
Route::get('/invoice-purchase/{purchase}', [PurchaseInvoiceController::class, 'invoice_purchase'])->name('invoice_purchase.view.store');