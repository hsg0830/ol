<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PassCode implements Rule
{
  private $posted_code;
  private $checkCodes;

  /**
   * Create a new rule instance.
   *
   * @return void
   */
  public function __construct($posted_code)
  {
    $this->posted_code = $posted_code;
    $this->checkCodes = [
      'general' => env('CHECK_CODE_GENERAL'),
      'special' => env('CHECK_CODE_SPECIAL'),
    ];
  }

  /**
   * Determine if the validation rule passes.
   *
   * @param  string  $attribute
   * @param  mixed  $value
   * @return bool
   */
  public function passes($attribute, $value)
  {
    return in_array($this->posted_code, $this->checkCodes);
  }

  /**
   * Get the validation error message.
   *
   * @return string
   */
  public function message()
  {
    return '암호가 맞지 않습니다.';
  }
}