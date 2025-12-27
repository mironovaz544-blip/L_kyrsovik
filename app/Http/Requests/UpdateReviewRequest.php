<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReviewRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'user_id' => [
                Rule::exists('users','id'),
            ],
            'service_id' => [
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
