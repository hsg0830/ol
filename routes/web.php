<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\MultiAuthController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

Route::prefix('editors')->group(function () {
  // 管理者ログイン・ログアウト
  Route::middleware('guest:editors')->group(function () {
    Route::get('login', [MultiAuthController::class, 'showLoginForm']);
    Route::post('login', [MultiAuthController::class, 'login'])->name('editors.login');
  });
  Route::middleware('auth:editors')->group(function () {
    // 管理者ログアウト
    // Route::post('logout', [MultiAuthController::class, 'logout'])->name('editors.logout');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('editors.logout');
    // 管理者トップページ
    Route::get('/', [MultiAuthController::class, 'index'])->name('editors.top');
  });
});

// Route::get('/dashboard', function () {
//   return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
