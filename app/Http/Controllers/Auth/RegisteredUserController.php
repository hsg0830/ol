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

class RegisteredUserController extends Controller
{
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

    if ($request->check_code === 'korea1234') {
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

    if ($request->check_code !== 'korea1234') {
      return ['result' => $result];
    }

    $request->validate([
      'name' => 'required|string|max:100',
      'birth_year' => 'required|integer',
      'birth_month' => 'required|integer|between:1,12',
      'birth_day' => 'required|integer|between:1,31',
      'sex' => 'required|integer|between:1,2',
      'school_id' => 'required|integer|exists:schools,id',
      'email' => 'required|string|email|max:255|unique:users',
      'password' => 'required|string|confirmed|min:8',
    ]);

    // $messages = [
    //   'birth_year.required' => '태여난 해를 선택하셔야 합니다.',
    //   'birth_month.required' => '태여난 달을 선택하셔야 합니다.',
    //   'birth_day.required' => '태여난 날을 선택하셔야 합니다.',
    //   'sex.required' => '성별을 선택하셔야 합니다.',
    //   'school_id.required' => '소속학교를 선택하셔야 합니다.',
    // ];

    $birth_date = $request->birth_year . '-' . $request->birth_month . '-' . $request->birth_day;
    $now = now();

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
      'last_login' => $now,
    ]));

    event(new Registered($user));
    $result = true;

    // return redirect(RouteServiceProvider::HOME);
    return ['result' => $result];
  }
}