<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
          'firstname' => 'required|string|max:32',
          'lastname' => 'required|string|max:32',
          'username' => 'required|string|max:16',
          'email' => 'required|string|unique:users,email',
          'password' => 'required|string|confirmed'
        ];
    }
}
