<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\TaskCreateRequest;
use App\Models\Task;
use App\Models\Article;
use App\Models\Ask;
use App\Models\Material;
use App\Models\User;
use App\Models\School;

class TasksController extends Controller
{
  public function index()
  {
    $articles = $this->get_articles();
    $asks = $this->get_asks();
    $materials = $this->get_materials();

    $isAuthorized = false;
    $userId = null;
    $users = [];

    if (Auth::guard('web')->check()) {
      $isAuthorized = true;
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
      'materials' => $materials,
      'isAuthorized' => $isAuthorized,
      'userId' => $userId,
      'users' => $users,
    ]);
  }

  public function getList(Request $request)
  {
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

    $tasks = $query->orderBy('start', 'asc')->get();

    return [
      'tasks' => $tasks,
    ];
  }

  public function create()
  {
    $articles = $this->get_articles();
    $asks = $this->get_asks();
    $materials = $this->get_materials();

    return view('tasks.post', [
      'articles' => $articles,
      'asks' => $asks,
      'materials' => $materials,
    ]);
  }

  public function get_tasks(Request $request)
  {
    $year = $request->year;
    $month = $request->month;
    $tasks = $this->get_current_task($year, $month);

    return [
      'tasks' => $tasks,
    ];
  }

  public function edit(Request $request)
  {
    $articles = $this->get_articles();
    $asks = $this->get_asks();
    $materials = $this->get_materials();

    $year = $request->year;
    $month = $request->month;
    $tasks = $this->get_current_task($year, $month);

    return view('tasks.post', [
      'articles' => $articles,
      'asks' => $asks,
      'materials' => $materials,
      'tasks' => $tasks,
      'year' => $year,
      'month' => $month,
    ]);
  }

  public function store(TaskCreateRequest $request)
  {
    $result = false;
    $year = $request->year;
    $month = $request->month;

    foreach ($request->tasks as $requestTask) {
      $task = new Task();
      $task->year = $year;
      $task->month = $month;
      $task->start = $requestTask['start'];
      $task->end = $requestTask['end'];
      $task->category_id = $requestTask['category_id'];

      if ($requestTask['category_id'] == 1) {
        $task->article_id = $requestTask['article_id'];
      } else if ($requestTask['category_id'] == 2) {
        $task->ask_id = $requestTask['ask_id'];
      } else if ($requestTask['category_id'] == 3) {
        $task->material_id = $requestTask['material_id'];
      }

      $task->save();
    }

    $result = true;
    $tasks = $this->get_current_task($year, $month);

    return [
      'result' => $result,
      'tasks' => $tasks,
    ];
  }

  public function addTask(Request $request)
  {
    $task = new Task();
    return $this->save_individual_task($task, $request);
  }

  public function update(Task $task, Request $request)
  {
    return $this->save_individual_task($task, $request);
  }

  private function save_individual_task($task, $request)
  {
    $result = false;
    $year = $request->year;
    $month = $request->month;

    $task->year = $year;
    $task->month = $month;
    $task->start = $request->task['start'];
    $task->end = $request->task['end'];
    $task->category_id = $request->task['category_id'];

    if ($request->task['category_id'] == 1) {
      $task->ask_id = null;
      $task->material_id = null;
      $task->article_id = $request->task['article_id'];
    } else if ($request->task['category_id'] == 2) {
      $task->article_id = null;
      $task->material_id = null;
      $task->ask_id = $request->task['ask_id'];
    } else if ($request->task['category_id'] == 3) {
      $task->article_id = null;
      $task->ask_id = null;
      $task->material_id = $request->task['material_id'];
    }

    $task->save();

    $result = true;
    $tasks = $this->get_current_task($year, $month);

    return [
      'result' => $result,
      'tasks' => $tasks,
    ];
  }

  public function destroy(Task $task, Request $request)
  {
    $result = $task->delete();

    $year = $request->year;
    $month = $request->month;
    $tasks = $this->get_current_task($year, $month);

    return [
      'result' => $result,
      'tasks' => $tasks,
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
      $tasks = $this->get_current_task($year, $month);
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

  private function get_current_task($year, $month)
  {
    $tasks = Task::where('year', $year)
      ->where('month', $month)
      ->orderBy('start', 'asc')
      ->get();

    return $tasks;
  }

  private function get_articles()
  {
    $articles = Article::where('status', 1)
      ->orderBy('released_at', 'desc')
      ->get();

    return $articles;
  }

  private function get_asks()
  {
    $asks = Ask::where('status', 1)
      ->orderBy('replied_at', 'desc')
      ->get();

    return $asks;
  }

  private function get_materials()
  {
    $materials = Material::where('status', 1)
      ->orderBy('released_at', 'desc')
      ->get();

    return $materials;
  }
}