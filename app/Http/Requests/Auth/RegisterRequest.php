<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255'
            ],
            'surname' => [
                'required',
                'string',
                'max:255',
            ],
            'patronymic' => [
                'required',
                'string',
                'max:255'
            ],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                'unique:users,email'
            ],
            'password' => [
                'required',
                'confirmed',
                Password::defaults()
            ],
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Поле имя обязательно для заполнения',
            'name.string' => 'Имя должно быть строкой',
            'name.max' => 'Имя не может превышать :max символов',

            'surname.required' => 'Поле фамилия обязательно для заполнения',
            'surname.string' => 'Фамилия должна быть строкой',
            'surname.max' => 'Фамилия не может превышать :max символов',

            'patronymic.required' => 'Поле отчество обязательно для заполнения',
            'patronymic.string' => 'Отчество должно быть строкой',
            'patronymic.max' => 'Отчество не может превышать :max символов',

            'email.required' => 'Поле email обязательно для заполнения',
            'email.string' => 'Email должен быть строкой',
            'email.lowercase' => 'Email должен быть в нижнем регистре',
            'email.email' => 'Введите корректный email адрес',
            'email.max' => 'Email не может превышать :max символов',
            'email.unique' => 'Пользователь с таким email уже существует',

            'password.required' => 'Поле пароль обязательно для заполнения',
            'password.confirmed' => 'Пароли не совпадают',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'name' => 'имя',
            'surname' => 'фамилия',
            'patronymic' => 'отчество',
            'email' => 'email',
            'password' => 'пароль',
        ];
    }
}
