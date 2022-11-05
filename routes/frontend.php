<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\BrandaController;


/*
|--------------------------------------------------------------------------
| List Routes
|--------------------------------------------------------------------------
*/
Route::get('hompage_branda',[BrandaController::class,'index']);

?>