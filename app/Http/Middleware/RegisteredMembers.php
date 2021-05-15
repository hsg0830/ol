<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class RegisteredMembers
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle(Request $request, Closure $next, $redirectToRoute = null)
  {

    if (Auth::guard('editors')->check()) {
      return $next($request);
    }

    if (!Auth::check()) {
      return redirect()->route('prohibited');
    }

    if ($request->user() instanceof MustVerifyEmail && !$request->user()->hasVerifiedEmail()) {
      return Redirect::guest(URL::route($redirectToRoute ?: 'verification.notice'));
    }

    return $next($request);
  }
}