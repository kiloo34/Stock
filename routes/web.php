<?php

use App\Http\Controllers\Admin\DashboardController;
// use App\Http\Controllers\Admin\MaterialController;
// use App\Http\Controllers\Admin\PemakaianController;

use App\Http\Controllers\Mandor\DashboardController as MandorDash;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::resource('adminMaterial', Admin\MaterialController::class);
        Route::resource('adminPemakaian', Admin\PemakaianController::class);
        Route::resource('mandor', Admin\MandorController::class);
    });

    Route::group(['prefix' => 'mandor', 'middleware' => ['role:mandor']], function () {
        Route::get('/', [MandorDash::class, 'index'])->name('mandor.dashboard');
        Route::resource('material', Mandor\MaterialController::class);
        Route::resource('pemakaian', Mandor\PemakaianController::class);
    });
});

// Route::get('/home', 'HomeController@index')->name('home');
