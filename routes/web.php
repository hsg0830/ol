<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\MultiAuthController;

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
  return view('home');
});

// 会員登コード認証用ルーティング
Route::post('check-code', [RegisteredUserController::class, 'confirm_code']);

// 管理者ログイン
Route::get('editor/login', [MultiAuthController::class, 'showLoginForm']);
Route::post('editor/login', [MultiAuthController::class, 'login'])->name('editor.login');
Route::post('editor/logout', [MultiAuthController::class, 'logout'])->name('editor.logout');

Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';