@extends('layouts.shop')

@section('title', $article->title . ' - Вкусняшка')

@section('content')
    <div class="bg-green-100 min-h-screen py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Хлебные крошки -->
            <nav class="flex mb-8" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('shop.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-green-600">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                            </svg>
                            Главная
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <a href="{{ route('shop.article') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-green-600 md:ml-2">
                                Статьи
                            </a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">{{ $article->title }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Кнопка "Назад к статьям" -->
            <div class="mb-6 flex justify-end">
                <a href="{{ route('shop.article') }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-br from-lime-200 to-green-500 hover:from-green-600 hover:to-lime-400 text-white text-sm font-medium rounded-lg transition-colors duration-150">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Назад к статьям
                </a>
            </div>

            <!-- Основной контент статьи -->
            <article class="bg-white rounded-2xl shadow-xl overflow-hidden">

                <!-- Заголовок и мета-информация -->
                <div class="px-8 pt-8 pb-4 border-b border-gray-100">
                    <div class="flex items-center justify-between mb-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                            {{ $article->type->label() ?? 'Статья' }}
                        </span>
                        <span class="text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full">
                            {{ $article->created_at->format('d.m.Y') }}
                        </span>
                    </div>

                    <h1 class="text-4xl font-bold text-green-600 mb-4">{{ $article->title }}</h1>
                </div>

                <!-- Изображение статьи (увеличенная высота) -->
                @if($article->thumbnail_url)
                    <div class="w-full h-[500px] bg-gradient-to-br from-lime-200 to-green-400">
                        <img src="{{ $article->thumbnail_url }}"
                             alt="{{ $article->title }}"
                             class="w-full h-full object-cover">
                    </div>
                @endif

                <!-- Текст статьи -->
                <div class="px-8 py-8">
                    @if($article->texts)
                        <div class="prose prose-lg max-w-none prose-green">
                            {!! nl2br(e($article->texts)) !!}
                        </div>
                    @else
                        <p class="text-gray-500 text-center py-8">Текст статьи отсутствует</p>
                    @endif
                </div>

                <!-- Нижняя мета-информация -->
                <div class="px-8 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-between text-sm text-gray-500">
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span>Опубликовано: {{ $article->created_at->format('d.m.Y') }}</span>
                        </div>

                        @if($article->updated_at && $article->updated_at->gt($article->created_at))
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                </svg>
                                <span>Обновлено: {{ $article->updated_at->format('d.m.Y') }}</span>
                            </div>
                        @endif
                    </div>

                    <!-- Просмотры (если есть поле views) -->
                    @if(property_exists($article, 'views') || isset($article->views))
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            <span>{{ $article->views ?? rand(100, 999) }} просмотров</span>
                        </div>
                    @endif
                </div>
            </article>

            <!-- Блок похожих статей (если нужно) -->
            @if(method_exists($article, 'relatedArticles') && $article->relatedArticles()->exists())
                <div class="mt-12">
                    <h2 class="text-2xl font-bold text-green-600 mb-6">Похожие статьи</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($article->relatedArticles()->limit(2)->get() as $relatedArticle)
                            <a href="{{ route('shop.show-article', $relatedArticle) }}"
                               class="bg-white rounded-xl shadow-md hover:shadow-xl transition duration-300 overflow-hidden flex">
                                <div class="w-1/3 bg-gradient-to-br from-lime-200 to-green-400">
                                    @if($relatedArticle->thumbnail_url)
                                        <img src="{{ $relatedArticle->thumbnail_url }}"
                                             alt="{{ $relatedArticle->title }}"
                                             class="w-full h-full object-cover">
                                    @endif
                                </div>
                                <div class="w-2/3 p-4">
                                    <h3 class="font-semibold text-gray-800 line-clamp-2">{{ $relatedArticle->title }}</h3>
                                    <p class="text-sm text-gray-500 mt-2">{{ $relatedArticle->created_at->format('d.m.Y') }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection
