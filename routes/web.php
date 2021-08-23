<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\MultiAuthController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ArticlesController;
// use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\AsksController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\NoticesController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TasksController;

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

Route::get('/', [HomeController::class, 'index']);

// 会員登録コード認証用ルーティング
Route::post('check-code', [RegisteredUserController::class, 'confirm_code']);

// 権限ない領域へのアクセス時に表示するページへのルーティング
Route::get('/prohibited', function () {
  return view('errors.prohibited');
})->name('prohibited');

// 規範原文
Route::get('/norms/{filename}', function ($filename) {
  return view('norms.' . $filename);
})->name('norms');

// 検索結果
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/all-search', function () {
  return view('search.all-search');
});

// 学習室
Route::prefix('articles')->group(function () {
  Route::get('/', [ArticlesController::class, 'index'])->name('articles.index');
  Route::get('/pagination', [ArticlesController::class, 'paginate']);
  Route::get('/{article}', [ArticlesController::class, 'show'])->name('articles.show');

  Route::middleware('auth:web')->group(function () {
    Route::post('{article}/follow', [FavoritesController::class, 'article_store'])->name('articles.follow');
    Route::delete('{article}/unfollow', [FavoritesController::class, 'article_destroy'])->name('articles.unfollow');
  });
});

// bbs
Route::prefix('bbs')->group(function () {
  Route::get('/', [AsksController::class, 'index'])->name('bbs.index');
  Route::get('/pagination', [AsksController::class, 'paginate']);
  Route::get('/{ask}', [AsksController::class, 'show'])->name('bbs.show'); // 認証なしでOKに変更

  Route::middleware('auth:web')->group(function () {
    Route::post('{ask}/follow', [FavoritesController::class, 'ask_store'])->name('bbs.follow');
    Route::delete('{ask}/unfollow', [FavoritesController::class, 'ask_destroy'])->name('bbs.unfollow');
  });

  // email-verify後にだけアクセスできるルーティング
  Route::middleware(['registered'])->group(function () {
    Route::post('/', [AsksController::class, 'store']);
  });
});

// 資料室   ←現在は臨時。6月〜7月に開発の予定。
Route::prefix('materials')->group(function () {
  Route::get('/', function () {
    return view('materials.index');
  })->name('materials.index');
});

// マイページ <-email-verify後にだけアクセスできるルーティング
Route::prefix('users')->middleware(['registered'])->group(function () {
  Route::get('/{user}', [UsersController::class, 'show'])->name('users.show');
  Route::post('/{user}/change-school', [UsersController::class, 'changeSchool']);
});

// 問い合わせ
Route::prefix('contact')->group(function () {
  Route::get('/', [ContactsController::class, 'showForm'])->name('contact.form');
  Route::post('/', [ContactsController::class, 'send']);
});

// QA
// Route::prefix('qa')->group(function () {
//   Route::get('/', [QuestionsController::class, 'index'])->name('qa.index');
//   Route::get('/pagination', [QuestionsController::class, 'paginate']);
//   Route::get('{question}', [QuestionsController::class, 'show'])->name('qa.show');
//   Route::post('/{question}/increment', [QuestionsController::class, 'addViewedCount']);
// });

// 学習課題
Route::prefix('tasks')->middleware(['registered'])->group(function () {
  Route::get('/', [TasksController::class, 'index'])->name('tasks.index');
  Route::get('/get-list', [TasksController::class, 'getList']);

  Route::middleware('auth:web')->group(function () {
    Route::post('{task}/cleared', [TasksController::class, 'toCleared'])->name('tasks.cleared');
    Route::delete('{task}/un-cleared', [TasksController::class, 'toUnCleared'])->name('tasks.uncleared');
  });
});

// 管理者関連
Route::prefix('editors')->group(function () {

  // 管理者ログイン
  Route::middleware('guest:editors')->group(function () {
    Route::get('login', [MultiAuthController::class, 'showLoginForm']);
    Route::post('login', [MultiAuthController::class, 'login'])->name('editors.login');
  });

  // 管理者としてログインしている場合のみアクセス可能なルーティング
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
      Route::put('/{article}/change-status', [ArticlesController::class, 'changeStatus']);
      Route::delete('/{article}', [ArticlesController::class, 'destroy']);
    });

    // QA管理
    // Route::prefix('qa')->group(function () {
    //   Route::get('/create', [QuestionsController::class, 'create'])->name('qa.create');
    //   Route::post('/', [QuestionsController::class, 'store']);
    //   Route::get('{question}/edit', [QuestionsController::class, 'edit'])->name('qa.edit');
    //   Route::put('/{question}', [QuestionsController::class, 'update']);
    //   Route::get('/list', [QuestionsController::class, 'showQuestionsList'])->name('qa.list');
    //   Route::get('/get-list', [QuestionsController::class, 'getQuestionsList']);
    //   Route::post('/{question}/change-status', [QuestionsController::class, 'changeStatus']);
    //   Route::delete('/{question}', [QuestionsController::class, 'destroy']);
    // });

    // bbs管理
    Route::prefix('bbs')->group(function () {
      Route::get('/list', [AsksController::class, 'showAsksList'])->name('bbs.list');
      Route::get('/get-list', [AsksController::class, 'getAsksList']);
      Route::get('/{ask}/edit', [AsksController::class, 'edit'])->name('bbs.edit');
      Route::put('/{ask}', [AsksController::class, 'update']);
      Route::put('/{ask}/change-status', [AsksController::class, 'changeStatus']);
      Route::delete('/{ask}', [AsksController::class, 'destroy']);
    });

    // お知らせ管理
    Route::prefix('notices')->group(function () {
      Route::get('/', [NoticesController::class, 'showList'])->name('notices.list');
      Route::get('/get-list', [NoticesController::class, 'getNoticesList']);
      Route::get('create', [NoticesController::class, 'create'])->name('notices.create');
      Route::post('/', [NoticesController::class, 'store']);
      Route::get('/{notice}', [NoticesController::class, 'edit'])->name('notices.edit');
      Route::put('/{notice}', [NoticesController::class, 'update']);
      Route::put('/{notice}/change-status', [NoticesController::class, 'changeStatus']);
      Route::delete('/{notice}', [NoticesController::class, 'destroy']);
    });

    // ユーザー管理
    Route::middleware('admin')->group(function () {
      Route::get('/users', [UsersController::class, 'index'])->name('users.management');
      Route::get('/users-list', [UsersController::class, 'list']);
      Route::delete('users/{user}', [UsersController::class, 'destroy']);
      Route::get('users-mount', [UsersController::class, 'sumUsersBySchool'])->name('users.mount');
    });

    // 問い合わせ管理
    Route::prefix('contacts')->group(function () {
      Route::get('/', [ContactsController::class, 'list'])->name('contacts.list');
      Route::get('/get-list', [ContactsController::class, 'getContactsList']);
      Route::get('{contact}', [ContactsController::class, 'showReplyForm'])->name('contacts.reply');
      Route::put('{contact}', [ContactsController::class, 'reply']);
      Route::delete('{contact}', [ContactsController::class, 'destroy']);
    });

    // 学習課題投稿・編集
    Route::prefix('tasks')->group(function () {
      Route::get('/create', [TasksController::class, 'create'])->name('tasks.create');
      Route::get('/edit', [TasksController::class, 'edit'])->name('tasks.edit');
      Route::post('/', [TasksController::class, 'store']);
      Route::put('/', [TasksController::class, 'update']);
      Route::get('progress', [TasksController::class, 'showProgress'])->name('tasks.progress');
    });
  });
});

require __DIR__ . '/auth.php';