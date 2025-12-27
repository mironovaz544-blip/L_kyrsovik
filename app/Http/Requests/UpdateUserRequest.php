<?php

namespace App\Http\Requests;

use App\Enums\UserRoleEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateUserRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'role' => [
                Rule::enum(UserRoleEnum::class),
            ],
            'name'=>[
                'required',
                'string',
                'max:255',
            ],
            'surname'=>[
                'required',
                'string',
                'max:255',
            ],
            'patronymic' => [
                'required',
                'string',
                'max:255'
            ],
            'email'=>[
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($this->user->id)
            ],
            'password'=>[
                'required',
                Password::min(size: 6)
            ],

        ];
    }
}
