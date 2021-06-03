<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\QuestionRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Question;
use App\Models\QuestionCategory;


class QuestionsController extends Controller
{
  public function index()
  {
    return view('qa.index');
  }

  public function paginate(Request $request)
  {
    $category_id = intval($request->categoryNo);

    $query = Question::query();

    if ($category_id > 0) {
      $query->where('category_id', $category_id);
    }

    if ($request->searchWord) {
      $keyword = '%' . $request->searchWord . '%';
      $query->where('title', 'like', $keyword);
    }

    $questions = $query->where('status', 1)->with('category')->orderBy('released_at', 'desc')->paginate(10);

    $categories = QuestionCategory::select('id', 'name')->get();

    return [
      'questions' => $questions,
      'categories' => $categories
    ];
  }

  public function addViewedCount(Question $question)
  {
    if (!Auth::guard('editors')->check()) {
      $question->viewed_count += 1;
      $question->save();
    }
  }

  public function show(Question $question) {
    return view('qa.show', [
      'question' => $question,
    ]);
  }

  public function create()
  {
    $categories = $this->categories();

    return view('qa.post', [
      'categories' => $categories,
    ]);
  }

  public function edit(Question $question)
  {
    $categories = $this->categories();

    return view('qa.post', [
      'question' => $question,
      'categories' => $categories,
    ]);
  }

  public function store(QuestionRequest $request)
  {
    $question = new Question();
    return $this->saveQuestion($request, $question);
  }

  public function update(QuestionRequest $request, Question $question)
  {
    return $this->saveQuestion($request, $question);
  }

  public function showQuestionsList()
  {
    $categories = QuestionCategory::select('id', 'name')->get();

    return view('qa.list', [
      'categories' => $categories,
    ]);
  }

  public function getQuestionsList(Request $request)
  {
    $category_id = intval($request->category_id);
    $status = intval($request->status);
    $viewed_count = intval($request->viewed_count);

    $query = Question::query();

    if ($category_id > 0) {
      $query->where('category_id', $category_id);
    }

    if ($status < 2) {
      $query->where('status', $status);
    }

    if ($viewed_count == 1) {
      $query->orderBy('viewed_count', 'desc');
    } elseif ($viewed_count == 2) {
      $query->orderBy('viewed_count', 'asc');
    } else {
      $query->orderBy('created_at', 'desc');
    }

    $questions = $query->with('category')->paginate(15);

    return ['questions' => $questions];
  }

  public function changeStatus(Question $question)
  {
    $question->status = !($question->status);
    $question->released_at = (intval($question->status) === 1) ? now() : null;
    $result = $question->save();

    return [
      'result' => $result,
    ];
  }

  public function destroy(Question $question)
  {
    return [
      'result' => $question->delete(),
    ];
  }

  // プライベートファンクション
  private function categories()
  {
    return QuestionCategory::with('sub_categories')->select('id', 'name')->get();
  }

  private function saveQuestion(Request $request, Question $question)
  {
    $result = false;

    if (!$question->exists) {
      $question->editor_id = Auth::id();
    }

    $question->category_id = $request->category_id;
    $question->sub_category_id = $request->sub_category_id;
    $question->title = $request->title;
    $question->answer = $request->answer;
    $question->status = $request->status;
    $question->released_at = (intval($question->status) === 1) ? now() : null;
    $result = $question->save();

    return [
      'result' => $result,
      'question' => $question,
    ];
  }
}