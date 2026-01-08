<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateReviewRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'user_id' => [
                Rule::exists('users','id'),
            ],
            'recipe_id' => [
                Rule::exists('recipes','id'),
            ],
            'rating' => [
                'required',
                'integer',
            ],
            'comment' => [
                'required',
                'string',
            ],
        ];
    }
}
