<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\BrandaController;


/*
|--------------------------------------------------------------------------
| List Routes
|--------------------------------------------------------------------------
*/
Route::get('hompage_branda',[BrandaController::class,'index']);
Route::get('hompage_book',[BrandaController::class,'book']);
Route::get('hompage_remove_from_cart/{id}',[BrandaController::class,'removeToCart']);
Route::get('hompage_add_to_cart/{id}',[BrandaController::class,'addTocart']);
Route::get('hompage_list_user_cart',[BrandaController::class,'getCardItem']);
Route::get('hompage_list_user_cart_success',[BrandaController::class,'getCardItem']);
Route::get('hompage_checkout_all_cart',[BrandaController::class,'checkOutAll']);
Route::get('hompage_my_order',[BrandaController::class,'getBookOrder']);
Route::post('hompage_kirim_pesan',[BrandaController::class,'kirimPesanAdmin']);
?>