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
    // 「条件をくぐり抜けた人だけOK」なパターンにすると将来的にユーザー形式や guard が増えても例外が発生しにくいかもしれません。（ホワイトリスト方式？？）
    if (Auth::guard('editors')->check()) {

        return $next($request);

    } else if (Auth::guard('web')->check()) {

        $user = $request->user();

        if ($user instanceof MustVerifyEmail && $user->hasVerifiedEmail()) {

            return $next($request);

        }

        return Redirect::guest(URL::route($redirectToRoute ?: 'verification.notice'));

    }

    return redirect()->route('prohibited');
  }
}