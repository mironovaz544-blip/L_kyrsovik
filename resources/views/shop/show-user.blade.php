@extends('layouts.shop')

@section('title', $advice->title . ' - Рецепт от пользователя')

@section('content')
    <div class="bg-green-50 min-h-screen py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Уведомления об успехе -->
            @if(session('success'))
                <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p>{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <!-- Хлебные крошки -->
            <div class="flex items-center justify-between mb-6">
                <nav class="flex" aria-label="Breadcrumb">
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
                                <a href="{{ route('shop.user-recept') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-green-600 md:ml-2">
                                    Рецепты пользователей
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">{{ $advice->title }}</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <a href="{{ route('shop.user-recept') }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-br from-lime-200 to-green-500 hover:from-green-600 hover:to-lime-400 text-white text-sm font-medium rounded-lg transition-colors duration-150">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Назад к списку
                </a>
            </div>

            <!-- Основной контент -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="lg:grid lg:grid-cols-2 lg:gap-8">
                    <!-- Левая колонка с фото -->
                    <div class="p-8 bg-gradient-to-br from-green-100 to-green-50 flex items-center justify-center">
                        <div class="w-full max-w-lg">
                            @if($advice->detail_image_url)
                                <img src="{{ $advice->detail_image_url }}"
                                     alt="{{ $advice->title }}"
                                     class="w-full h-auto rounded-xl shadow-2xl">
                            @else
                                <div class="w-full aspect-square bg-gradient-to-br from-green-300 to-green-500 rounded-xl shadow-2xl flex items-center justify-center">
                                    <svg class="h-32 w-32 text-white opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Правая колонка с информацией -->
                    <div class="p-8">
                        <!-- Категория -->
                        <div class="mb-4">
                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold bg-green-100 text-green-800">
                                {{ $advice->type->label() ?? 'Рецепт' }}
                            </span>
                        </div>

                        <!-- Название -->
                        <h1 class="text-4xl font-bold text-green-600 mb-4">{{ $advice->title }}</h1>

                        <!-- Информация об авторе -->
                        <div class="flex items-center mb-6 p-4 bg-gray-50 rounded-xl">
                            <div class="h-12 w-12 rounded-full bg-green-600 flex items-center justify-center text-white font-bold text-lg">
                                {{ $advice->user ? strtoupper(substr($advice->user->name ?? $advice->user->email, 0, 1)) : 'П' }}
                            </div>
                            <div class="ml-4">
                                <p class="text-sm text-gray-500">Автор рецепта</p>
                                <p class="text-lg font-semibold text-gray-800">
                                    {{ $advice->user ? $advice->user->userFullName() : 'Пользователь' }}
                                </p>
                                <p class="text-sm text-gray-500">
                                    Добавлено: {{ $advice->created_at->format('d.m.Y H:i') }}
                                </p>
                            </div>
                        </div>

                        <!-- Описание -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-green-600 mb-2">Описание</h3>
                            <p class="text-gray-700 leading-relaxed">{{ $advice->description }}</p>
                        </div>

                        <!-- Состав -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-green-600 mb-2">Состав продуктов</h3>
                            <div class="bg-gray-50 rounded-xl p-4">
                                <p class="text-gray-700 whitespace-pre-line">{{ $advice->counts }}</p>
                            </div>
                        </div>

                        <!-- Процесс приготовления -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-green-600 mb-2">Процесс приготовления</h3>
                            <div class="bg-gray-50 rounded-xl p-4">
                                <p class="text-gray-700 whitespace-pre-line leading-relaxed">{{ $advice->process }}</p>
                            </div>
                        </div>

                        <!-- Кнопка поделиться -->
                        <div class="mt-8 flex gap-3">
                            <button onclick="window.print()" class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-3 px-6 rounded-xl transition duration-200 flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                                </svg>
                                Распечатать
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Дополнительная информация -->
            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-white rounded-xl shadow-md p-4 text-center">
                    <svg class="w-8 h-8 mx-auto text-green-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-sm text-gray-500">Время приготовления</p>
                    <p class="text-lg font-semibold text-gray-800">По рецепту</p>
                </div>
                <div class="bg-white rounded-xl shadow-md p-4 text-center">
                    <svg class="w-8 h-8 mx-auto text-green-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    <p class="text-sm text-gray-500">Количество порций</p>
                    <p class="text-lg font-semibold text-gray-800">По рецепту</p>
                </div>
                <div class="bg-white rounded-xl shadow-md p-4 text-center">
                    <svg class="w-8 h-8 mx-auto text-green-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-sm text-gray-500">Сложность</p>
                    <p class="text-lg font-semibold text-gray-800">Средняя</p>
                </div>
            </div>

            <!-- Кнопка "Добавить свой рецепт" с проверкой авторизации -->
            <div class="mt-12 text-center">
                @auth
                    <a href="{{ route('shop.create-advice') }}"
                       class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-bold rounded-full shadow-lg hover:shadow-xl transition duration-300">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Добавить свой рецепт
                    </a>
                @else
                    <button onclick="openModal('loginModal')"
                            class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-bold rounded-full shadow-lg hover:shadow-xl transition duration-300">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Добавить свой рецепт
                    </button>
                @endauth
            </div>
        </div>
    </div>
@endsection
