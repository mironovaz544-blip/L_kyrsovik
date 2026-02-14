<?php

namespace App\Http\Requests;

use App\Enums\ArticleTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreArticleRequest extends FormRequest
{


    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:150'],
            'concept' => ['nullable', 'string'],
            'texts' => ['nullable', 'string'],
            'type' => ['required', Rule::enam(ArticleTypeEnum::class)],
            'photo' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:5120'],
        ];
    }
}
