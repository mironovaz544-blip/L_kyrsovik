@extends('layouts.app')

@section('title', 'Рецепты')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-green-600">Пользователь #{{ $recipe->id }}</h1>
        <div class="flex gap-2">
            <a href="{{ route('recipes.edit', $recipe) }}" class="bg-gradient-to-r from-amber-400 to-red-500 hover:from-red-600 hover:to-amber-500 text-white font-medium py-2 px-4 rounded">
                Изменить
            </a>
            <a href="{{ route('recipes.index') }}" class="bg-gradient-to-r from-lime-400 to-green-500 hover:from-green-700 hover:to-lime-500 text-white font-medium py-2 px-4 rounded">
                Назад
            </a>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6 space-y-4">
        <div class="flex justify-between">
            <span class="font-medium text-green-700">Заголовок:</span>
            <span class="text-gray-800">{{ $recipe->title }}</span>
        </div>

        <div class="flex justify-between">
            <span class="font-medium text-green-700">Описание:</span>
            <span class="text-gray-800">{{ $recipe->description }}</span>
        </div>
        <div class="flex justify-between">
            <span class="font-medium text-green-700">Состав:</span>
            <span class="text-gray-800">{{ $recipe->counts }}</span>
        </div>
        <div class="flex justify-between">
            <span class="font-medium text-green-700">Процесс:</span>
            <span class="text-gray-800">{{ $recipe->process }}</span>
        </div>
        <div class="flex justify-between">
            <span class="font-medium text-green-700">Тип:</span>
            <span class="text-gray-800">{{ $recipe->type }}</span>
        </div>



        @if($recipe->mainPhoto)
            <div>
                <h3 class="text-sm font-medium text-gray-500 mb-2">
                    Фотографии
                </h3>
                <div class="space-y-2">
                    <img src="{{ $recipe->mainPhoto->detail_url }}" alt="Photo" class="w-full max-x-2xl h-auto object-cover rounded">
                    <div class="text-sm text-gray-500">
                        <p>Оригинал: {{ $recipe->mainPhoto->original_name }}</p>
                        <p>Размер: {{ number_format($recipe->mainPhoto->size / 1024, 2) }} КВ</p>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center py-8 border-gray-50 rounded">
                <p class="text-gray-500">Фотография отсутствует</p>
            </div>
        @endif
        <div class="flex justify-between">
            <span class="font-medium text-green-700">Рецепт создан:</span>
            <span class="text-gray-800">{{ $recipe->created_at->format('d.m.Y, H:i') }}</span>
        </div>

    </div>
@endsection
