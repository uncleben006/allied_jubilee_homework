<?php

use App\Http\Controllers\StarController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
//    return view('welcome');
    return redirect()->route('user.index');
});

Route::resource('/user', UserController::class)->only(['index','create', 'store']);

Route::post('user/check', [UserController::class,'check'])->name('user.check');
Route::post('user/verify', [UserController::class,'verify'])->name('user.verify');
Route::post('user/logout', [UserController::class,'logout'])->name('user.logout');

Route::resource('/star', StarController::class)->only(['index']);
