<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth','verified','isadmin'])->group(function () {
    Route::prefix('/admin')->name('')->group(function () {
        Route::view('dashboard', 'back.pages.admin.home')->name("dashboard");
        Route::view('products', 'back.pages.admin.products')->name("products");

    });
});
