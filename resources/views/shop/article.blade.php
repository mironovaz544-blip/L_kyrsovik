@extends('layouts.shop')

@section('title', 'Статьи - Вкусняшка')

@section('content')

    <div class="bg-green-100 min-h-screen py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Заголовок страницы -->
            <div class="text-center mb-12">
                <h1 class="text-5xl font-bold text-green-600 mb-4">Интересное о кулинарии</h1>
                <p class="text-2xl text-gray-600">Советы, рекомендации и интересные факты о здоровом питании</p>
            </div>

            @if($articles->isEmpty())
                <div class="text-center py-16">
                    <svg class="mx-auto h-24 w-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                    <h3 class="mt-4 text-xl font-semibold text-gray-900">Статьи не найдены</h3>
                    <p class="mt-2 text-gray-600">На данный момент статьи отсутствуют</p>
                </div>
            @else
                <!-- Сетка 2 колонки для десктопа с увеличенными карточками -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    @foreach($articles as $article)
                        <div class="bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition duration-300 transform hover:-translate-y-2 flex flex-col md:flex-row h-[320px]">
                            <!-- Изображение статьи - слева (45% ширины) -->
                            <div class="md:w-[45%] h-full bg-gradient-to-br from-lime-200 to-green-400 relative">
                                @if($article->thumbnail_url)
                                    <img src="{{ $article->thumbnail_url }}"
                                         alt="{{ $article->title }}"
                                         class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <svg class="h-20 w-20 text-white opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                        </svg>
                                    </div>
                                @endif

                                <!-- Бейдж категории на изображении -->
                                <div class="absolute top-3 left-3">
                                    <span class="px-3 py-1 bg-white/90 backdrop-blur-sm text-green-600 text-sm font-medium rounded-full shadow">
                                        {{ $article->type->label() ?? 'Статья' }}
                                    </span>
                                </div>
                            </div>

                            <!-- Контент статьи - справа (55% ширины) -->
                            <div class="md:w-[55%] p-5 flex flex-col h-full">
                                <!-- Заголовок и дата -->
                                <div class="flex justify-between items-start mb-4"> <!-- Увеличено с mb-2 до mb-4 -->
                                    <h3 class="text-2xl font-bold text-gray-800 line-clamp-2 flex-1 pr-3 leading-snug">
                                        {{ $article->title }}
                                    </h3>
                                    <span class="text-sm text-gray-500 whitespace-nowrap bg-gray-100 px-2 py-1 rounded-full">
                                        {{ $article->created_at->format('d.m.Y') }}
                                    </span>
                                </div>

                                <!-- Концепция статьи -->
                                <p class="text-lg text-gray-600 mb-5 line-clamp-3 leading-normal">
                                    {{ $article->concept ?? 'Описание отсутствует' }}
                                </p>

                                <!-- Убран блок с кратким текстом статьи (Story) -->

                                <!-- Нижняя часть с мета-информацией и кнопкой -->
                                <div class="mt-auto flex items-center justify-between">
                                    <div class="flex items-center space-x-3 text-xs text-gray-500">
                                        <div class="flex items-center">
                                            <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span class="hidden sm:inline">{{ $article->created_at->diffForHumans() }}</span>
                                            <span class="sm:hidden">{{ $article->created_at->format('d.m') }}</span>
                                        </div>

                                        <div class="flex items-center">
                                            <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            <span>{{ rand(100, 999) }}</span>
                                        </div>
                                    </div>

                                    <!-- Кнопка "Читать" -->
                                    <a href="{{ route('shop.show-article', $article) }}"
                                       class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-lime-400 to-green-500 hover:from-green-600 hover:to-lime-400 text-white text-sm font-medium rounded-lg transition duration-150 shadow-md hover:shadow-lg">
                                        <span class="hidden sm:inline">Читать далее</span>
                                        <span class="sm:hidden">Далее</span>
                                        <svg class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Пагинация -->
                @if($articles->hasPages())
                    <div class="mt-12">
                        {{ $articles->links() }}
                    </div>
                @endif
            @endif
        </div>
    </div>
@endsection
