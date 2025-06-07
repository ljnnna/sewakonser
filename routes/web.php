<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// use App\Http\Controllers\Auth\LoginFestController;
// use App\Http\Controllers\Auth\DashboardFestController;

// Route::get('/loginfestify', [LoginFestController::class, 'showLoginForm'])->name('login');
// Route::post('/loginfestify', [LoginFestController::class, 'login'])->name('login.custom');

// Route::get('/dashboardfest', [DashboardFestController::class, 'index'])->name('dashboardfest');
// //->middleware('auth');

// use App\Http\Controllers\CatalogueController;

// Route::get('/catalogue', [CatalogueController::class, 'index'])->name('catalogue');

// use App\Http\Controllers\ListController;
// Route::get('/listproduct', [ListController::class, 'index'])->name('list_product');

// Route::get('/home', function () {
//     return view('pages.home');
// });

use App\Http\Controllers\ListProdukController;

Route::get('/listproduk', [ListProdukController::class, 'show'])->name('list_produk');
Route::post('/listproduk', [ListProdukController::class, 'simpan'])->name('produk.simpan');
Route::put('/listproduk/{id}', [ListProdukController::class, 'update'])->name('produk.update');
Route::delete('/listproduk/{id}', [ListProdukController::class, 'delete'])->name('produk.delete');