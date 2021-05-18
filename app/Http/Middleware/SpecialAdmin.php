<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpecialAdmin
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle(Request $request, Closure $next)
  {
    if (!Auth::guard('editors')->check() || Auth::user()->role < 1) {
      if (Auth::guard('editors')->check()) {
        return redirect()->route('editors.top');
      } else {
        return redirect()->route('prohibited');
      }
    }

    return $next($request);
  }
}