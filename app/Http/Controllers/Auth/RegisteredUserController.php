<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\School;
// use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
// use Illuminate\Http\Request;
use App\Http\Requests\CodeCheckRequest;
use App\Http\Requests\UserRegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisteredAlertMail;

class RegisteredUserController extends Controller
{
  public function create()
  {
    $schools = School::get();

    return view('auth.register', [
      'schools' => $schools,
    ]);
  }

  public function confirm_code(CodeCheckRequest $request)
  {
    return ['result' => true];
  }

  public function store(UserRegisterRequest $request)
  {
    $result = false;

    // 時刻と権限の決定
    $now = now();
    $role = $request->check_code == env('CHECK_CODE_SPECIAL') ?  1 : 0;

    // 登録及びログイン
    Auth::login($user = User::create([
      'name' => $request->name,
      'birth_year' => $request->birth_year,
      'birth_month' => $request->birth_month,
      'birth_day' => $request->birth_day,
      'birth_date' => $request->birth_date,
      'sex' => $request->sex,
      'school_id' => $request->school_id,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'role' => $role,
      'last_login' => $now,
    ]));

    event(new Registered($user));

    // 管理者へのメール送信
    $admin = config('app.admins');
    $usersMount = User::count();

    Mail::to($admin)->send(new RegisteredAlertMail($user, $usersMount));

    $result = true;
    $url = url('/verify-email');

    return [
      'result' => $result,
      'url' => $url,
    ];
  }
}