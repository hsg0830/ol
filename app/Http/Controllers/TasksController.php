<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\Article;
use App\Models\Ask;
use App\Models\User;
use App\Models\School;

class TasksController extends Controller
{
  public function index()
  {
    $articles = Article::where('status', 1)->get();

    $asks = Ask::where('status', 1)->get();

    $isAuthoried = false;
    $userId = null;
    $users = [];

    if (Auth::guard('web')->check()) {
      $isAuthoried = true;
      $userId = Auth::id();

      if (Auth::guard('web')->user()->role > 0) {
        $users = User::where('school_id', Auth::user()->school_id)
          ->orderBy('name', 'asc')
          ->get();
      }
    }

    return view('tasks.index', [
      'articles' => $articles,
      'asks' => $asks,
      'isAuthoried' => $isAuthoried,
      'user' => $userId,
      'users' => $users,
    ]);
  }

  public function getList(Request $request)
  {
    $year = 0;
    $month = 0;

    $query = Task::query();

    $query->with('cleared_users:id');

    if ($request->year > 0) {
      $year = intval($request->year);
      $query->where('year', $year);
    }

    if ($request->month > 0) {
      $month = intval($request->month);
      $query->where('month', $month);
    }

    $tasks = $query->get();

    return [
      'tasks' => $tasks,
    ];
  }

  public function create()
  {
    $articles = Article::where('status', 1)
      ->orderBy('released_at', 'desc')
      ->get();

    $asks = Ask::where('status', 1)
      ->orderBy('replied_at', 'desc')
      ->get();

    return view('tasks.post', [
      'articles' => $articles,
      'asks' => $asks,
    ]);
  }

  public function edit(Request $request)
  {
    $articles = Article::where('status', 1)
      ->orderBy('released_at', 'desc')
      ->get();

    $asks = Ask::where('status', 1)
      ->orderBy('replied_at', 'desc')
      ->get();

    $year = $request->year;
    $month = $request->month;

    $tasks = Task::where('year', $year)
      ->where('month', $month)
      ->get();

    return view('tasks.post', [
      'articles' => $articles,
      'asks' => $asks,
      'tasks' => $tasks,
      'year' => $year,
      'month' => $month,
    ]);
  }

  public function store(TaskRequest $request)
  {
    return $this->saveTasks($request);
  }

  public function update(TaskRequest $request)
  {
    $tasks = Task::where('year', $request->year)
      ->where('month', $request->month)
      ->get();

    foreach ($tasks as $task) {
      $task->delete();
    }

    return $this->saveTasks($request);
  }

  private function saveTasks($request)
  {
    $result = false;

    $year = $request->year;
    $month = $request->month;

    foreach ($request->tasks as $requestTask) {
      $task = new Task();
      $task->year = $year;
      $task->month = $month;
      $task->month_index = $requestTask['month_index'];
      $task->start = $requestTask['start'];
      $task->end = $requestTask['end'];
      $task->category_id = $requestTask['category_id'];

      if ($requestTask['category_id'] == 1) {
        $task->article_id = $requestTask['article_id'];
      } else {
        $task->ask_id = $requestTask['ask_id'];
      }

      $task->save();
    }

    $result = true;

    return [
      'result' => $result,
    ];
  }

  public function toCleared(Task $task)
  {
    $user = Auth::user();
    $result = $user->toCleared($task->id);
    $isCleared = $user->is_cleared_task($task->id);

    return [
      'result' => $result,
      'isCleared' => $isCleared,
    ];
  }

  public function toUnCleared(Task $task)
  {
    $user = Auth::user();
    $result = $user->toUnCleared($task->id);
    $isCleared = $user->is_cleared_task($task->id);

    return [
      'result' => $result,
      'isCleared' => $isCleared,
    ];
  }

  public function showProgress(Request $request)
  {
    $tasks = [];
    $users = [];

    $year = 0;
    $month = 0;
    $school_id = 0;

    if ($request->year && $request->month) {
      $year = $request->year;
      $month = $request->month;

      $tasks = Task::where('year', $year)
        ->where('month', $month)
        ->orderBy('month_index', 'asc')
        ->get();
    }

    if ($request->school_id > 0) {
      $school_id = $request->school_id;
      $users = School::find($school_id)->users()
        ->orderBy('name', 'asc')
        ->get();
    } else if ($request->school_id == 'all') {
      $users = User::orderBy('school_id', 'asc')
      ->orderBy('name', 'asc')
      ->get();
    }


    $schools = School::all();

    return view('tasks.progress', [
      'tasks' => $tasks,
      'users' => $users,
      'schools' => $schools,
      'year' => $year,
      'month' => $month,
      'school_id' => $school_id,
    ]);
  }
}