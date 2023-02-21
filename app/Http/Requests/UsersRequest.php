<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UsersRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $validated = [
            "name" => "required|string|min:3|max:255",
            "email" => "required|email|unique:users,email|max:255",
            "role" => "required|in:user,admin",
            "password" => "required|min:8|confirmed",
        ];
      
        if ($this->isMethod('PUT')) {
            $validated = ["email" => [
                        "required",
                        "email",
                        "max:255",
                        Rule::unique('users', 'email')->ignore($this->user->id),
                    ],
                ];        
        }

        return $validated;
    }
}
