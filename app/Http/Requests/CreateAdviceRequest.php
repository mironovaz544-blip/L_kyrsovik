<?php

namespace App\Http\Requests;

use App\Enums\AdviceTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateAdviceRequest extends FormRequest
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
                Rule::enum(AdviceTypeEnum::class),
            ],
            'photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
            'user_id' => [
                Rule::exists('users','id'),
            ],
        ];

    }
}

