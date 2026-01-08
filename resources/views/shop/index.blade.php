@extends('layouts.shop')

@section('title', 'Каталог товаров - Литвинушка')
@section('content')
    <div class="bg-gradient-to-t from-indigo-600 to-purple-600 text-white" xmlns="http://www.w3.org/1999/html">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Добро пожаловать в магазин!
                </h1>
                <p class="text-xl md:text-2xl text-indigo-100 mb-8">Качественные товары и услуги по доступным ценам!
                </p>
                <div class="max-w-md mx-auto">
                    <div class="relative">
                        <input type="text"
                               placeholder="Поиск товаров..." class="w-full px-4 py-3 rounded lg-text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-300">
                        <button class="absolute right-2 top-2 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md transition duration-150 ease-in-out">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Мы предоставляем</h2>
                <p class="text-gray-600">Выберите из нашего широкого ассортимента товаров</p>
            </div>
            <div class="flex items-center">
                <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option>Сортировка</option>
                    <option>По цене (возрастание)</option>
                    <option>По цене (убывание)</option>
                    <option>По названию</option>
                </select>
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
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 gap-6">

                @foreach($recipes as $recipe)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300 ease-out transform hover:translate-x-1">
                        <a href="{{ route('shop.show', $recipe) }}" class="block">
                            <div class="h-48 bg-gradient-to-br from-indigo-400 to-purple-500 flex items-center justify-center">
                                <svg class="h-20 w-20 text-white opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                            </div>

                            <div class="p-4">
                                <div class="mb-2">
        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
    {{ $recipe->type->label() ?? 'Товар' }}
        </span>
                                </div>

                                <h3 class="text-lg font-semibold text-gray-900 mb-2 line-clamp-2">
                                    {{ $recipe->title }}
                                </h3>
                                <div class="mb-3">
                                    <x-rating-stars :rating="$recipe->averageRating()" :count="$recipe->reviewsCount()" size="sm" />
                                </div>

                                <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                    {{ $recipe->description ?? 'Описание отсутствует' }}
                                </p>


                            </div>
                        </a>

                        <div class="p-4 pt-0">
                            <button class="mt-4 w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-150 ease-in-out flex items-center justify-center">
                                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                В корзину
                            </button>
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
@endsection
