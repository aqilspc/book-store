<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\BookCategoryController;
use App\Http\Controllers\Backend\BookController;
use App\Http\Controllers\Backend\BookOrderController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\UserMessageController;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| List Routes
|--------------------------------------------------------------------------
*/
 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 Route::get('backend_dashboard',[DashboardController::class,'index']);
 //===================backend_user_list=========================
 Route::get('backend_user_list',[UserController::class,'index']);
 // Route::post('backend_user_list_store',[UserController::class,'store']);
 // Route::post('backend_user_list_update/{id}',[UserController::class,'update']);
 // Route::get('backend_user_list_delete/{id}',[UserController::class,'delete']);
 //===================backend_user_message=========================
 Route::get('backend_user_message',[UserMessageController::class,'index']);
 // Route::post('backend_user_store',[UserMessageController::class,'store']);
 // Route::post('backend_user_update/{id}',[UserMessageController::class,'update']);
 // Route::get('backend_user_delete/{id}',[UserMessageController::class,'delete']);
 //===================backend_book_category=========================
 Route::get('backend_book_category',[BookCategoryController::class,'index']);
 Route::post('backend_book_category_store',[BookCategoryController::class,'store']);
 Route::post('backend_book_category_update/{id}',[BookCategoryController::class,'update']);
 Route::get('backend_book_category_delete/{id}',[BookCategoryController::class,'delete']);
 //===================backend_book_list=========================
 Route::get('backend_book_list',[BookController::class,'index']);
 Route::post('backend_book_list_store',[BookController::class,'store']);
 Route::post('backend_book_list_update/{id}',[BookController::class,'update']);
 Route::get('backend_book_list_delete/{id}',[BookController::class,'delete']);
 //===================backend_book_order=========================
 Route::get('backend_book_order',[BookOrderController::class,'index']);
 Route::post('backend_book_order_update/{id}',[BookOrderController::class,'update']);
?>