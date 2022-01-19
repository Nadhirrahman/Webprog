<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

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


Route::get('/login', [AuthController::class, 'index_login'])->middleware(['isNotLogged'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'index_register'])->middleware(['isNotLogged'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [MainController::class, 'index_home'])->name('home');
Route::get('/view/{page?}', [MainController::class, 'index_viewpage'])->name('viewpage');

Route::get('/search/', [MainController::class, 'search_viewpage']);
Route::post('/search/', [MainController::class, 'search_viewpage']);

Route::get('/detail/{furniture_id}', [MainController::class, 'index_detail'])->name('detail_furniture');

Route::get('/profile', [MainController::class, 'index_profile'])->middleware(['isLogged'])->name('profile');

Route::get('/profile/update', [MainController::class, 'index_profile_update'])->middleware(['isLogged'])->name('profile_update');
Route::post('/profile/update', [MainController::class, 'update_profile'])->middleware(['isLogged']);

Route::get('/transactions', [MainController::class, 'index_transaction'])->middleware(['isLogged'])->name('transactions');

Route::prefix('member')->middleware(['isMember'])->group(function () {
    Route::post('/addToCart', [MemberController::class, 'addToCart']);

    Route::get('/cart', [MemberController::class, 'index_cart'])->name('member_cart');
    Route::post('/cart/change', [MemberController::class, 'change_cart']);

    Route::get('/checkout', [MemberController::class, 'index_checkout'])->name('member_checkout');
    Route::post('/checkout', [MemberController::class, 'checkout']);
});

Route::prefix('admin')->middleware(['isAdmin'])->group(function () {
    Route::get('/update/{furniture_id}', [AdminController::class, 'index_update'])->name('admin_update');
    Route::post('/update', [AdminController::class, 'updateFurniture']);
    Route::post('/delete', [AdminController::class, 'deleteFurniture']);

    Route::get('/add', [AdminController::class, 'index_add_furniture'])->name('admin_add');
    Route::post('/add', [AdminController::class, 'add_furniture']);
});
