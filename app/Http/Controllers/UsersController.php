<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\School;

class UsersController extends Controller
{
  public function index()
  {
    return view('users.index');
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

  public function show(User $user) {
    return view('users.show', [
      'user' => $user
    ]);
  }
}