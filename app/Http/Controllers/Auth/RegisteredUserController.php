<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\School;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisteredAlertMail;

class RegisteredUserController extends Controller
{
  private $checkCodes = [
    'general' => '19550525_edu',
    'special' => '19461005_korea',
  ];

  /**
   * Display the registration view.
   *
   * @return \Illuminate\View\View
   */
  public function create()
  {
    $schools = School::get();

    return view('auth.register', [
      'schools' => $schools,
    ]);
  }

  public function confirm_code(Request $request)
  {
    $result = false;

    if (in_array($request->check_code, $this->checkCodes)) {
      $result = true;
      return ['result' => $result];
    }
    return ['result' => $result];
  }

  /**
   * Handle an incoming registration request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\RedirectResponse
   *
   * @throws \Illuminate\Validation\ValidationException
   */
  public function store(Request $request)
  {
    $result = false;

    if (!(in_array($request->check_code, $this->checkCodes))) {
      return ['result' => $result];
    }

    $birth_date = $request->birth_year . '-' .
      Str::padLeft($request->birth_month, 2, '0') . '-' .
      Str::padLeft($request->birth_day, 2, '0');

    $request->merge(['birth_date' => $birth_date]);

    $request->validate([
      'name' => 'required|string|max:100',
      'birth_year' => 'required|integer',
      'birth_month' => 'required|integer|between:1,12',
      'birth_day' => 'required|integer|between:1,31',
      'birth_date' => 'required|date|date_format:Y-m-d',
      'sex' => 'required|integer|between:1,2',
      'school_id' => 'required|integer|exists:schools,id',
      'email' => 'required|string|email|max:255|unique:users',
      'password' => 'required|string|confirmed|min:8',
    ], [
      'birth_year.required' => '태여난 해를 선택하셔야 합니다.',
      'birth_month.required' => '태여난 달을 선택하셔야 합니다.',
      'birth_day.required' => '태여난 날을 선택하셔야 합니다.',
      'birth_date.date' => '생년월일을 정확히 선택했는지 확인하십시오.',
      'sex.required' => '성별을 선택하셔야 합니다.',
      'school_id.required' => '소속학교를 선택하셔야 합니다.',
      'email.unique' => '이미 등록된 메일주소입니다.',
      'password.min' => '암호는 8글자이상이 되게 설정하십시오.',
    ]);

    $now = now();
    $role = $request->check_code == $this->checkCodes['special'] ?  1 : 0;

    Auth::login($user = User::create([
      'name' => $request->name,
      'birth_year' => $request->birth_year,
      'birth_month' => $request->birth_month,
      'birth_day' => $request->birth_day,
      'birth_date' => $birth_date,
      'sex' => $request->sex,
      'school_id' => $request->school_id,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'role' => $role,
      'last_login' => $now,
    ]));

    event(new Registered($user));

    $admin = config('app.admins');
    $usersMount = User::count();

    Mail::to($admin)->send(new RegisteredAlertMail($user, $usersMount));

    $result = true;
    $url = url('/verify-email');

    // return redirect(RouteServiceProvider::HOME);
    return [
      'result' => $result,
      'url' => $url,
    ];
  }
}