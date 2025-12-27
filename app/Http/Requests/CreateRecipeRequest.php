<?php

namespace App\Http\Requests;

use App\Enums\RecipeTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRecipeRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'role'=>[
                Rule::enum(RecipeTypeEnum::class),
            ],
            'title' => [
                'required',
                'string',
                'max:150'
            ],
            'image' => [
                'required',
                'file',
                'image',
                'mimes:jpg,jpeg,png'
            ],
            'description' => [
                'required',
                'string'
            ],
            'count' => [
                'required',
                'string'
            ],
            'process' =>[
                'required',
                'string'
    ],
            'type' =>[
                'required',
                'string'
            ],
        ];

    }
}
