<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdateProfilePasswordRequest extends FormRequest
{


    public function rules(): array
    {
        return [
            'current_password' => ['required','current_password'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ];
    }

    public function messages(): array
    {
        return [
            'current_password.required' => 'Пожалуйста введите текущий пароль',
            'current_password.current_password' => 'Текущий пароль неверен',
            'password.required' => 'Пожалуйста введите новый пароль',
            'password.confirmed' => 'Пароли не совпадают'

        ];
    }
}
