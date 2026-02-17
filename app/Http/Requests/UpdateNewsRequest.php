<?php

namespace App\Http\Requests;

use App\Enums\NewsTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateNewsRequest extends FormRequest
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
            'story' => [
                'required',
                'string'
            ],

            'type'=>['required',
                Rule::enum(NewsTypeEnum::class),],

            'photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
            'deleted_photo' => [
                'nullable',
                'boolean',
            ],

        ];
    }
}

