<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'rating' => [
                'required',
                'integer',
                'min:1',
                'max:5'
            ],
            'comment' => [
                'required',
                'string',
                'max:1000'
            ],
        ];
    }
    public function messages(): array{
        return [
            'rating.required' => 'Пожалуйста, выберите оценку!',
            'rating.min' => 'Оценка должна быть от 1 до 5',
            'rating.max' => 'Оценка должна быть от 1 до 5',
            'comment.required' => 'Пожалуйста, напишите комментарий!',
            'comment.max' => 'Комментарий не должен превышать 1000 символов!',
        ];
    }
}
