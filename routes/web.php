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


Route::get('/', [AuthorController::class , 'index'])->name('home');

Route::view("shop", 'back.pages.front.shop')->name("shop");
Route::view("checkout", 'back.pages.front.checkout')->name("checkout");
Route::view("single", 'back.pages.front.single')->name("single");
Route::view("cart", 'back.pages.front.cart')->name("cart");
Route::view("contact", 'back.pages.front.contact')->name("contact");

require __DIR__ .'/auth.php';
require __DIR__ .'/admin.php';

Route::get("asd", function() {
    dd(fake()->name);
});


