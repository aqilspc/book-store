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
Route::get('hompage_add_to_cart/{id}',[BrandaController::class,'addTocart']);
?>