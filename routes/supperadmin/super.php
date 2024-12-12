<?php

use App\Http\Controllers\sub_method\SubMethodController;
use App\Http\Controllers\subscription\SubscriptionController;
use App\Http\Controllers\supperadmin\SupperAdminHomeController;
use App\Http\Controllers\supperadmin\UserController;
use App\Http\Controllers\supperadmin\UserEditController;

Route::group(['prefix' => 'supperadmin', 'middleware' => 'auth'], function () {
    Route::get('/supperdash', [SupperAdminHomeController::class, 'home'])->name('supper.home');
    Route::get('/userlist', [UserController::class, 'userlist'])->name('supper.userlist');
    Route::get('/supper-useradd', [UserController::class, 'useradd'])->name('supper.add');
    Route::get('/subcription',[SubscriptionController::class,'subsciptionadd'])->name('subsciptionadd');
    Route::get('/sub-method',[SubMethodController::class,'method'])->name('method.add');
    Route::post('/method-add', [SubMethodController::class,'method_add'])->name('method.post');
    Route::post('/subcription',[SubscriptionController::class,'subsciptionpost'])->name('subsciption.post');
    Route::get('/sub-list', [SubscriptionController::class,'sub_list'])->name('sub.list');
    Route::post('/user-post',[UserController::class,'userpost'])->name('user.post');
    Route::post('/edituser', [UserEditController::class, 'edituser'])->name('super.useredit');
    Route::post('/useredit', [UserEditController::class, 'useredit'])->name('super.userediting');
});