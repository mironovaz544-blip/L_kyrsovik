@extends('layouts.app')

@section('title', 'Пользователи')

@section('content')

<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-3xl font-semibold text-green-500">Отзывы</h1>
        <a href="{{ route('reviews.create') }}" class="bg-gradient-to-r from-lime-400 to-green-500 hover:from-green-700 hover:to-lime-500 text-white font-medium py-2 px-4 rounded">
            Создать новый
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse border border-gray-200">
            <thead class="bg-gray-100">
            <tr>
                <th class="border border-gray-200 px-4 py-2 text-left text-lg font-medium text-green-600">ID</th>
                <th class="border border-gray-200 px-4 py-2 text-left text-lg font-medium text-green-600">Пользователь</th>
                <th class="border border-gray-200 px-4 py-2 text-left text-lg font-medium text-green-600">Рецепт</th>
                <th class="border border-gray-200 px-4 py-2 text-left text-lg font-medium text-green-600">Рейтинг</th>
                <th class="border border-gray-200 px-4 py-2 text-left text-lg font-medium text-green-600">Коментарий</th>
                <th class="border border-gray-200 px-4 py-2 text-left text-lg font-medium text-green-600">Действие</th>
            </tr>
            </thead>
            <tbody>
            @forelse($reviews as $review)
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-200 px-4 py-2 text-sm text-gray-700">{{ $review->id }}</td>
                    <td class="border border-gray-200 px-4 py-2 text-sm text-gray-700">{{ $review->user->userFullName() }}</td>
                    <td class="border border-gray-200 px-4 py-2 text-sm text-gray-700">{{ $review->recipe->title }}</td>
                    <td class="border border-gray-200 px-4 py-2 text-sm text-gray-700">{{ $review->rating }} б.</td>
                    <td class="border border-gray-200 px-4 py-2 text-sm text-gray-700">{{ $review->comment }}</td>
                    <td class="border border-gray-200 px-4 py-2 text-sm text-gray-700 flex gap-2">
                        <a href="{{ route('reviews.show', $review) }}" class="bg-gradient-to-r from-lime-400 to-green-600 hover:from-green-600 hover:to-lime-400 text-white py-2 px-4  rounded text-sm">
                            Показать
                        </a>
                        <a href="{{ route('reviews.edit', $review) }}" class="bg-gradient-to-r from-amber-400 to-red-500 hover:from-red-600 hover:to-amber-500 text-white py-2 px-4  rounded text-sm">
                            Изменить
                        </a>
                        <form action="{{ route('reviews.destroy', $review) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-gradient-to-r from-fuchsia-500 to-red-500 hover:from-red-700 hover:to-fuchsia-400 text-white py-2 px-4  rounded text-sm">
                                Удалить
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="px-4 py-2 text-center text-gray-500">Нет данных</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
