<?php

namespace App\Http\Requests;

use App\Enums\ArticleTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateArticleRequest extends FormRequest
{

    public function rules(): array
    {
        return [

            'title' => [
                'required',
                'string',
                'max:150'
            ],

            'content' => [
                'required',
                'string'
            ],

            'texts' =>[
                'required',
                'string'
            ],
            'type'=>[
                'required',
                Rule::enum(ArticleTypeEnum::class),
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

