<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController as R;
use App\Http\Controllers\MenuController as M;
use App\Http\Controllers\DishController as D;
use App\Http\Controllers\StorerestaurantRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will be assigned to the "web" middleware group.
| Now create something great!
|
*/

Route::prefix('admin/restaurants')->name('restaurants.')->group(function () {
    Route::get('/', [R::class, 'index'])->name('index');
    Route::get('/create', [R::class, 'create'])->name('create');
    Route::post('/', [R::class, 'store'])->name('store');
    Route::get('/{restaurant}', [R::class, 'show'])->name('show');
    Route::get('/{restaurant}/edit', [R::class, 'edit'])->name('edit');
    Route::put('/{restaurant}', [R::class, 'update'])->name('update');
    Route::delete('/{restaurant}', [R::class, 'destroy'])->name('destroy');
});

Route::prefix('admin/menus')->name('menus.')->group(function () {
    Route::get('/', [M::class, 'index'])->name('index');
    Route::get('/create', [M::class, 'create'])->name('create');
    Route::post('/', [M::class, 'store'])->name('store');
    Route::get('/{menu}', [M::class, 'show'])->name('show');
    Route::get('/{menu}/edit', [M::class, 'edit'])->name('edit');
    Route::put('/{menu}', [M::class, 'update'])->name('update');
    Route::delete('/{menu}', [M::class, 'destroy'])->name('destroy');
});

Route::prefix('admin/dishes')->name('dishes.')->group(function () {
    Route::get('/', [D::class, 'index'])->name('index');
    Route::get('/create', [D::class, 'create'])->name('create');
    Route::post('/', [D::class, 'store'])->name('store');
    Route::get('/{dish}', [D::class, 'show'])->name('show');
    Route::get('/{dish}/edit', [D::class, 'edit'])->name('edit');
    Route::put('/{dish}', [D::class, 'update'])->name('update');
    Route::delete('/{dish}', [D::class, 'destroy'])->name('destroy');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
