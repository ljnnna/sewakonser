<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\Auth\LoginFestController;
use App\Http\Controllers\Auth\DashboardFestController;

Route::get('/loginfestify', [LoginFestController::class, 'showLoginForm'])->name('login');
Route::post('/loginfestify', [LoginFestController::class, 'login'])->name('login.custom');

Route::get('/dashboardfest', [DashboardFestController::class, 'index'])->name('dashboardfest');
//->middleware('auth');

use App\Http\Controllers\CatalogueController;

Route::get('/catalogue', [CatalogueController::class, 'index'])->name('catalogue');
