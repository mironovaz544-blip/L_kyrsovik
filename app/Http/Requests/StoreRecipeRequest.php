<?php

namespace App\Http\Requests;

use App\Enums\RecipeTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRecipeRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:150'],
            'description' => ['nullable', 'string'],
            'counts' => ['nullable', 'string'],
            'process' => ['nullable', 'string'],
            'type' => ['required', Rule::enum(RecipeTypeEnum::class)],
            'photo' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:5120'],
        ];
    }
}
