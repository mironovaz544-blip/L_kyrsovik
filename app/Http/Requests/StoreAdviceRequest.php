<?php

namespace App\Http\Requests;

use App\Enums\AdviceTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAdviceRequest extends FormRequest
{
    /**
     * Определяем, может ли пользователь делать этот запрос
     */
    public function authorize(): bool
    {
        return auth()->check(); // Только авторизованные пользователи
    }

    /**
     * Правила валидации
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:150'],
            'description' => ['required', 'string', 'min:10'], // сделали required
            'counts' => ['required', 'string', 'min:10'],      // сделали required
            'process' => ['required', 'string', 'min:20'],     // сделали required
            'type' => ['required', Rule::enum(AdviceTypeEnum::class)],
            'photo' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:5120'],
        ];
    }

    /**
     * Кастомные сообщения об ошибках
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Пожалуйста, укажите название рецепта',
            'title.max' => 'Название не может быть длиннее 150 символов',

            'description.required' => 'Добавьте краткое описание блюда',
            'description.min' => 'Описание должно быть не менее 10 символов',

            'counts.required' => 'Перечислите все ингредиенты',
            'counts.min' => 'Состав должен быть не менее 10 символов',

            'process.required' => 'Опишите процесс приготовления',
            'process.min' => 'Процесс должен быть не менее 20 символов',

            'type.required' => 'Выберите категорию рецепта',

            'photo.image' => 'Файл должен быть изображением',
            'photo.mimes' => 'Допустимые форматы: JPG, JPEG, PNG, WebP',
            'photo.max' => 'Максимальный размер файла 5MB',
        ];
    }

    /**
     * Подготовка данных перед валидацией
     */
    protected function prepareForValidation(): void
    {
        // Можно добавить очистку данных если нужно
        $this->merge([
            'title' => strip_tags($this->title),
            'description' => strip_tags($this->description),
        ]);
    }
}
