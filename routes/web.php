<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdjustmentController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

Route::post('deleteSelected', [App\Http\Controllers\UserController::class, 'deleteSelected'])->name('delete');

Route::resource('users', App\Http\Controllers\UserController::class);

Route::get('/adjustments', [AdjustmentController::class, 'inv_adjustment'])->name('adjustments');
// Route::post('/update_data', [App\Http\Controllers\AdjustmentController::class, '']);

Route::get('get-inventory-data', [AdjustmentController::class, 'index'])->name('inventory-adjustments');

