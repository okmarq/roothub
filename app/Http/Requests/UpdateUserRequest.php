<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
    // return [
    //   'username' => 'required|string',
    //   'email' => 'required|string',
    //   'password' => 'required|string'
    // ];
    return [
      'username_or_email' => [
        'required',
        Rule::exists('users')->where(function ($query) {
          $query->where('username', $this->username_or_email)
            ->orWhere('email', $this->username_or_email);
        }),
      ],
      'password' => 'required|string|min:8',
    ];
  }
}