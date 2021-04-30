<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\MultiAuthController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\MailSendController; //テスト臨時
use App\Http\Controllers\ArticlesController;
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

// メール送信テスト
Route::get('/mail', [MailSendController::class, 'index']);

// email-verifyテスト
Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
  return view('test.verified');
})->name('verified');

// 会員登録コード認証用ルーティング
Route::post('check-code', [RegisteredUserController::class, 'confirm_code']);

// 規範原文
Route::get('/norms/{filename}', function ($filename) {
  return view('norms.' . $filename);
})->name('norms');

// 学習室
Route::prefix('articles')->group(function () {
  Route::get('/', [ArticlesController::class, 'index'])->name('articles.index');
  Route::get('/pagination', [ArticlesController::class, 'paginate']);
  Route::get('/{article}', [ArticlesController::class, 'show'])->name('articles.show');
});

// マイページ
Route::prefix('users')->group(function () {
  Route::get('/{user}', [UsersController::class, 'show'])->name('users.show');
});

// 管理者関連
Route::prefix('editors')->group(function () {

  // 管理者ログイン
  Route::middleware('guest:editors')->group(function () {
    Route::get('login', [MultiAuthController::class, 'showLoginForm']);
    Route::post('login', [MultiAuthController::class, 'login'])->name('editors.login');
  });

  Route::middleware('auth:editors')->group(function () {
    // 管理者ログアウト
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('editors.logout');

    // 管理者トップページ
    Route::get('/', [MultiAuthController::class, 'index'])->name('editors.top');

    //ファイル保存・一覧表示機能
    Route::prefix('media')->group(function () {
      Route::get('/', [MediaController::class, 'index'])->name('media');
      Route::get('/list', [MediaController::class, 'list']);
      Route::post('/upload', [MediaController::class, 'store']);
    });

    // 学習室の記事管理
    Route::prefix('articles')->group(function () {
      Route::get('/create', [ArticlesController::class, 'create'])->name('articles.create');
      Route::post('/', [ArticlesController::class, 'store']);
      Route::get('/{article}/edit', [ArticlesController::class, 'edit'])->name('articles.edit');
      Route::put('/{article}', [ArticlesController::class, 'update']);
      Route::get('/list', [ArticlesController::class, 'showArticlesList'])->name('articles.list');
      Route::get('/get-list', [ArticlesController::class, 'getArticlesList']);
      Route::post('/{article}/change-status', [ArticlesController::class, 'changeStatus']);
      Route::delete('/{article}', [ArticlesController::class, 'destroy']);
    });

    // ユーザー管理
    Route::get('/users', [UsersController::class, 'index'])->name('users.management');
    Route::get('/users-list', [UsersController::class, 'list']);
    Route::delete('users/{user}', [UsersController::class, 'destroy']);
  });
});

require __DIR__ . '/auth.php';