@extends('layouts.app')

@section('title', 'Пользователи')

@section('content')

<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-green-600">Отзыв #{{ $review->id }}</h1>
        <div class="flex gap-2">
            <a href="{{ route('users.edit', $review) }}" class="bg-gradient-to-r from-amber-400 to-red-500 hover:from-red-600 hover:to-amber-500 text-white font-medium py-2 px-4 rounded">
                Изменить
            </a>
            <a href="{{ route('reviews.index') }}" class="bg-gradient-to-r from-lime-400 to-green-500 hover:from-green-700 hover:to-lime-500 text-white font-medium py-2 px-4 rounded">
                Назад
            </a>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6 space-y-4">
        <div class="flex justify-between">
            <span class="font-medium text-green-700">Пользователь:</span>
            <span class="text-gray-800">{{ $review->user->userFullName() }}</span>
        </div>
        <div class="flex justify-between">
            <span class="font-medium text-green-700">Услуга:</span>
            <span class="text-gray-800">{{ $review->recipe->title }}</span>
        </div>
        <div class="flex justify-between">
            <span class="font-medium text-green-700">Рейтинг:</span>
            <span class="text-gray-800">{{ $review->rating }}</span>
        </div>
        <div class="flex justify-between">
            <span class="font-medium text-green-700">Коментарий:</span>
            <span class="text-gray-800">{{ $review->comment }}</span>
        </div>
        <div class="flex justify-between">
            <span class="font-medium text-green-700">Коментарий оставлен:</span>
            <span class="text-gray-800">{{ $review->created_at }}</span>
        </div>
    </div>
</div>
@endsection
