<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class AuthenticatedSessionController extends Controller
{
  /**
   * Display the login view.
   *
   * @return \Illuminate\View\View
   */
  public function create()
  {
    return view('auth.login');
  }

  /**
   * Handle an incoming authentication request.
   *
   * @param  \App\Http\Requests\Auth\LoginRequest  $request
   * @return \Illuminate\Http\RedirectResponse
   */
  public function store(LoginRequest $request)
  {
    $request->authenticate();

    $request->session()->regenerate();

    $user = Auth::user();
    $user->login_count += 1;
    $user->last_login = now();
    $user->save();

    return redirect()->intended(RouteServiceProvider::HOME);
  }

  /**
   * Destroy an authenticated session.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\RedirectResponse
   */
  public function destroy(Request $request)
  {
    // editors への影響がないので guard('web') は削っておいた方がいいかもしれません
    // 結局続くセッション破壊で問題なくログアウトはできるのですが・・・
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    $uri = $request->path();

    if (Str::startsWith($uri, 'editors')) {
      // return redirect('editors');
      // 細かくて恐縮ですが、上記では２回リダイレクトが発生しますので以下がベターかもしれません。
      // なお、ルート名を使ってリダイレクトしておくと、今後ルートのURLを変更しても自動的に変更されるのでおすすめです ^^b
      return redirect()->route('editors.login');
    }

    return redirect('/');
  }
}