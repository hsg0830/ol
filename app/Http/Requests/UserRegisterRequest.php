<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
// use Illuminate\Contracts\Validation\Rule;
use App\Rules\PassCode;
use Illuminate\Support\Str;

class UserRegisterRequest extends FormRequest
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
    $birth_date = $this->birth_year . '-' .
      Str::padLeft($this->birth_month, 2, '0') . '-' .
      Str::padLeft($this->birth_day, 2, '0');
    // dd($birth_date);

    $this->merge(['birth_date' => $birth_date]);
    // dd($this->birth_date);

    return [
      'check_code' => ['required', new PassCode($this->check_code)],
      'name' => 'required|string|max:100',
      'birth_year' => 'required|integer',
      'birth_month' => 'required|integer|between:1,12',
      'birth_day' => 'required|integer|between:1,31',
      'birth_date' => 'required|date|date_format:Y-m-d',
      'sex' => 'required|integer|between:1,2',
      'school_id' => 'required|integer|exists:schools,id',
      'email' => 'required|string|email|max:255|unique:users',
      'password' => 'required|string|confirmed|min:8',
    ];
  }

  public function messages()
  {
    return [
      'birth_year.required' => '태여난 해를 선택하셔야 합니다.',
      'birth_month.required' => '태여난 달을 선택하셔야 합니다.',
      'birth_day.required' => '태여난 날을 선택하셔야 합니다.',
      'birth_date.date' => '생년월일을 정확히 선택했는지 확인하십시오.',
      'sex.required' => '성별을 선택하셔야 합니다.',
      'school_id.required' => '소속학교를 선택하셔야 합니다.',
      'email.unique' => '이미 등록된 메일주소입니다.',
      'password.min' => '암호는 8글자이상이 되게 설정하십시오.',
    ];
  }
}