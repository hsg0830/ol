<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskCreateRequest extends FormRequest
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
    return [
      'year' => ['required'],
      'month' => ['required'],
      'tasks.*.category_id' => [
        'required',
        Rule::in([1, 2, 3]),
      ],
      'tasks.*.article_id' => [
        'nullable',
        'required_if:tasks.*.category_id,1',
        // 'integer',
        // Rule::exists('articles', 'id'),
      ],
      'tasks.*.ask_id' => [
        'nullable',
        'required_if:tasks.*.category_id,2',
        // 'integer',
        // Rule::exists('asks', 'id')
      ],
      'tasks.*.material_id' => [
        'nullable',
        'required_if:tasks.*.category_id,3',
        // 'integer',
        // Rule::exists('asks', 'id')
      ],
      'tasks.*.start' => ['required', 'date'],
      'tasks.*.end' => ['required', 'date'],
    ];
  }
}