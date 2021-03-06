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
    if (!session()->has('url.intended')) {
      session(['url.intended' => session()->get('_previous')]);
    }
    // if (!session()->has('url.intended')) {
    //   session(['url.intended' => url()->previous()]);
    //   dd(session()->all());
    // }

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

    $url = session()->get('url.intended.url');

    if ($url) {
      return redirect($url);
    }
    
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
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    $uri = $request->path();

    if (Str::startsWith($uri, 'editors')) {
      return redirect()->route('editors.login');
    }

    return redirect('/');
  }
}