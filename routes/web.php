<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\MediaController;

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
    // return view('welcome');
    return view('home');
});

//ファイル保存・一覧表示機能のテスト
Route::prefix('media')->group(function () {
  Route::get('/', [MediaController::class, 'index']);
  Route::get('/list', [MediaController::class, 'list']);
  Route::post('upload', [MediaController::class, 'store']);
});

Route::post('check-code', [RegisteredUserController::class, 'confirm_code']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';