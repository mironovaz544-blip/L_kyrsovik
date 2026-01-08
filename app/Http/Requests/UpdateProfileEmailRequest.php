<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileEmailRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'email'=>[
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($this->user()->id),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Пожалуйста введите email',
            'email.email' => 'Введите корректный email адрес',
            'email.unique' => 'Этот email уже используется',
            'email.max' => 'Email не должен превышать 255 символов'
        ];
    }
}
