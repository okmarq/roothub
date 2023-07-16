<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
   */
  public function rules(): array
  {
    return [
      'username_or_email' => 'required',
      'password' => 'required|string|min:8',
    ];
  }

  public function withValidator($validator)
  {
    $validator->after(function ($validator) {
      if (!$this->isValidUsernameOrEmail()) {
        $validator->errors()->add('username_or_email', 'Invalid username or email.');
      }
    });
  }

  protected function isValidUsernameOrEmail()
  {
    $user = User::where('username', $this->username_or_email)
      ->orWhere('email', $this->username_or_email)
      ->first();

    return $user !== null;
  }
}