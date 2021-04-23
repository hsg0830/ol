<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\MultiAuthController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\UsersController;

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

    //ファイル保存・一覧表示機能
    Route::prefix('media')->group(function () {
      Route::get('/', [MediaController::class, 'index'])->name('media');
      Route::get('/list', [MediaController::class, 'list']);
      Route::post('upload', [MediaController::class, 'store']);
    });

    // ユーザー管理
    Route::get('/users', [UsersController::class, 'index'])->name('users.management');
    Route::get('/users-list', [UsersController::class, 'list']);
    Route::delete('users/{user}', [UsersController::class, 'destroy']);
  });
});

require __DIR__ . '/auth.php';