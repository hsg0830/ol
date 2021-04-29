<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\ArticleCategory;
use App\Models\SubCategory;

class ArticleRequest extends FormRequest
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
    $category_id = $this->category_id;
    $sub_category_id = $this->sub_category_id;
    $category_ids = ArticleCategory::pluck('id');
    $has_sub_category = SubCategory::where('category_id', $category_id)->exists();

    return [
      'title' => ['required', 'max:50'],
      'category_id' => ['required', Rule::in($category_ids)],
      'sub_category_id' => [
        'nullable',
        Rule::requiredIf($has_sub_category),
        Rule::exists('sub_categories', 'id')->where(function ($query) use ($category_id, $sub_category_id) {
          return $query->where('id', $sub_category_id)
            ->where('category_id', $category_id);
        }),
      ],
      'subContents' => ['required'],
      'subContents.*.order' => ['required', 'integer', 'min:1'],
      'subContents.*.title' => ['required', 'string', 'max:50'],
      'subContents.*.description' => ['required', 'string'],
    ];
  }
}