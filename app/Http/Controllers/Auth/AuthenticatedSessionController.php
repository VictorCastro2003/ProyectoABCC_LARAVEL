<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    public function authenticate()
    {
        if (!Auth::attempt(
            $this->only('name', 'password'),
            $this->boolean('remember')
        )) {
            throw ValidationException::withMessages([
                'name' => __('auth.failed'),
            ]);
        }
    }
}