<?php

namespace App\Http\Requests;

use App\Enums\RecipeTypeEnum;
use App\Enums\ServiceTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRecipeRequest extends FormRequest
{

    public function rules(): array
    {
        return [

            'title' => [
                'required',
                'string',
                'max:150'
            ],

            'description' => [
                'required',
                'string'
            ],
            'counts' => [
                'required',
                'string'
            ],
            'process' =>[
                'required',
                'string'
            ],
            'type'=>[
                'required',
                Rule::enum(RecipeTypeEnum::class),
            ],
            'photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
        ];

    }
}
