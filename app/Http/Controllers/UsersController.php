<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\School;

class UsersController extends Controller
{
  public function index()
  {
    return view('users.list');
  }

  public function list()
  {
    $users = User::with('school')->get();
    $schools = School::select('id', 'name')->get();

    return [
      'users' => $users,
      'schools' => $schools,
    ];
  }

  public function destroy(User $user)
  {
    return [
      'result' => $user->delete(),
    ];
  }

  public function show(User $user)
  {
    if (Auth::id() === $user->id || Auth::guard('editors')->check()) {
      $schools = School::select('id', 'name')->get();

      return view('users.show', [
        'user' => $user,
        'schools' => $schools,
      ]);
    }

    return redirect()->route('prohibited');
  }

  public function changeSchool(Request $request, User $user)
  {
    $result = false;

    if (Auth::id() === $user->id || Auth::guard('editors')->check()) {
      if ($user->school_id == $request->school_id) {
        return [
          'result' => $result,
        ];
      }

      $user->school_id = $request->school_id;
      $result = $user->save();
    }

    return [
      'result' => $result,
      'user' => $user,
    ];
  }

  public function sumUsersBySchool() {
    $schools = School::select('id', 'name')->get();

    return view('users.schools', [
      'schools' => $schools,
    ]);
  }
}