<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
// use App\Models\Task;
// use App\Models\Article;
// use App\Models\Ask;

class TaskRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    $mode = $this->mode;
    $taskIds = DB::table('task_user')->pluck('task_id')->toArray();

    return [
      'year' => ['required'],
      'month' => ['required'],
      'tasks.*.id' => [
        'nullable',
        Rule::requiredIf($mode == 'edit'),
        Rule::notIn($taskIds)
      ],
      'tasks.*.category_id' => [
        'required',
        Rule::in([1, 2]),
      ],
      'tasks.*.article_id' => [
        'nullable',
        'required_if:tasks.*.category_id,1',
        // Rule::exists('articles', 'id'),
      ],
      'tasks.*.ask_id' => [
        'nullable',
        'required_if:tasks.*.category_id,2',
        // Rule::exists('asks', 'id')
      ],
      'tasks.*.start' => ['required', 'date'],
      'tasks.*.end' => ['required', 'date'],
    ];
  }

  // public function withValidator($validator)
  // {
  //   $validator->sometimes('tasks.*.article_id', 'required|exists:articles,id', function ($input) {
  //     return $input->category_id == 1;
  //   });
  // }

  // public function message() {
  //   return [
  //     'tasks.*.id.rule' => '안돼!'
  //   ];
  // }
}