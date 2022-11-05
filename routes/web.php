<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/
    require_once 'frontend.php';
/*
/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
*/
    require_once 'backend.php';
/*
|--------------------------------------------------------------------------
| Web Routes Main
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('hompage_branda');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
