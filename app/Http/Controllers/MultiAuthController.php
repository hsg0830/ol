<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MultiAuthController extends Controller
{
  public function showLoginForm()
  {
      return view('editors.login');
  }

  public function login(Request $request)
  {
      $credentials = $request->only(['email', 'password']);
      $guard = $request->guard;
      $remember = $request->has('remember');

      if (Auth::guard($guard)->attempt($credentials, $remember)) {
          return redirect('editors');
      }

      return back()->withErrors([
          'auth' => ['認証に失敗しました']
      ]);
  }

  // public function logout(Request $request) {
  //     Auth::logout();
  //     $request->session()->invalidate();
  //     $request->session()->regenerateToken();
  //     return redirect('/editors/login');
  // }

  public function index() {
    return view('editors/top');
  }
}