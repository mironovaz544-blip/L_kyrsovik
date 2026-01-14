@extends('layouts.shop')

@section('title', 'Каталог рецептов - Вкусняшка')
@section('content')
    <div class="bg-green-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-3xl font-bold text-green-500 mb-2">Мы предоставляем</h2>
                <p class="text-gray-600">Выберите из нашего широкого ассортимента рецептов</p>
            </div>
            <div class="flex items-center">
                <form action="{{ route('recept.index') }}" method="GET">
                    @csrf
                <select name="sort"
                        class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                    onchange="this.form.submit()">
                    <option value="">Сортировка</option>
                    <option value="type_asc">По категории(возрастание)</option>
                    <option value="type_desc">По категории(убывание)</option>
                    <option value="title_asc">По наименованию(возрастание)</option>
                    <option value="rating_asc">По рейтингу(возрастание)</option>
                    <option value="rating_desc">По рейтингу(убывание)</option>
                </select>
                </form>
            </div>
        </div>

        @if($recipes->isEmpty())
            <div class="text-center py-16">
                <svg class="mx-auto h-24 w-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                </svg>
                <h3 class="mt-4 text-xl font-semibold text-gray-900">Товары не найдены</h3>
                <p class="mt-2 text-gray-600">В данный момент товары отсутствуют в каталоге</p>
            </div>

        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-4 gap-6">

                @foreach($recipes as $recipe)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300 ease-out transform hover:translate-x-1">

                            <div class="h-48 bg-gradient-to-br from-lime-200 to-green-500 flex items-center justify-center">
                                <svg class="h-20 w-20 text-white opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                            </div>

                            <div class="p-4">
                                <div class="mb-2">
        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-gray-700">
    {{ $recipe->type->label() ?? 'Рецепт' }}
        </span>
                                </div>

                                <h3 class="text-lg font-semibold text-green-500 mb-2 line-clamp-2">
                                    {{ $recipe->title }}
                                </h3>
                                <div class="mb-3">
                                    <x-rating-stars :rating="$recipe->averageRating()" :count="$recipe->reviewsCount()" size="sm" />
                                </div>

                                <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                    {{ $recipe->description ?? 'Описание отсутствует' }}
                                </p>
                            </div>


                        <div class="p-4 pt-0">
                            <a href="{{ route('shop.show', $recipe) }}" class="block">
                            <button class="mt-4 w-full bg-gradient-to-br from-lime-200 to-green-500 hover:from-green-600 hover:to-lime-400
                            text-white font-semibold py-2 px-4 rounded-lg transition duration-150 ease-in-out flex items-center justify-center">
                                Подробнее
                            </button>
                            </a>
                        </div>
                    </div>

                @endforeach
            </div>

            @if($recipes->hasPages())
                <div class="mt-12">
                    {{ $recipes->links() }}
                </div>
            @endif
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectElement = document.querySelector('select[name="sort"]');

            selectElement.addEventListener('change', function() {
                this.form.submit();
            });
        });
        </script>
@endsection
