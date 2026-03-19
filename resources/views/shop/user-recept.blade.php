@extends('layouts.shop')

@section('title', 'Рецепты от пользователей')

@section('content')

    <div class="bg-green-100 min-h-screen py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Заголовок -->
            <div class="text-center mb-12">
                <h1 class="text-5xl font-bold text-green-600 mb-4">Рецепты от пользователей</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Домашние рецепты, которыми делятся наши читатели. Присоединяйтесь и делитесь своими кулинарными шедеврами!
                </p>
            </div>

            <!-- Поиск и фильтры -->
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-10">
                <form method="GET" action="{{ route('shop.user-recept') }}" class="space-y-4">
                    <div class="flex flex-col md:flex-row gap-4">
                        <!-- Поиск -->
                        <div class="flex-1">
                            <div class="relative">
                                <input type="text"
                                       name="search"
                                       value="{{ request('search') }}"
                                       placeholder="Поиск рецептов..."
                                       class="w-full px-4 py-3 pl-12 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:ring focus:ring-green-200 transition">
                                <svg class="absolute left-4 top-3.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                        </div>

                        <!-- Фильтр по категории -->
                        <div class="md:w-64">
                            <select name="category" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:ring focus:ring-green-200 transition">
                                <option value="">Все категории</option>
                                @foreach(\App\Enums\AdviceTypeEnum::cases() as $type)
                                    <option value="{{ $type->value }}" {{ request('category') == $type->value ? 'selected' : '' }}>
                                        {{ $type->label() }} ({{ $categoryCounts[$type->value] ?? 0 }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Сортировка -->
                        <div class="md:w-48">
                              <select name="sort" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:ring focus:ring-green-200 transition">
                                <option value="newest" {{ request('sort', 'newest') == 'newest' ? 'selected' : '' }}>Сначала новые</option>
                                <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Сначала старые</option>
                                <option value="title_asc" {{ request('sort') == 'title_asc' ? 'selected' : '' }}>По названию (А-Я)</option>
                                <option value="title_desc" {{ request('sort') == 'title_desc' ? 'selected' : '' }}>По названию (Я-А)</option>
                            </select>
                        </div>

                        <!-- Кнопки -->
                        <div class="flex gap-2">
                            <button type="submit" class="px-6 py-3 bg-green-500 hover:bg-green-600 text-white font-medium rounded-xl transition shadow-md">
                                Применить
                            </button>
                            <a href="{{ route('shop.user-recept') }}" class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-xl transition shadow-md">
                                Сбросить
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Количество результатов -->
            <div class="mb-6 text-gray-600">
                Найдено рецептов: <span class="font-bold text-green-600">{{ $userRecipes->total() }}</span>
            </div>

            <!-- Сетка рецептов -->
            @if($userRecipes->isNotEmpty())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6">
                    @foreach($userRecipes as $recipe)
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300 ease-out transform hover:-translate-y-1 flex flex-col h-full">
                            <div class="h-48 bg-gradient-to-br from-green-300 to-green-500 relative">
                                @if($recipe->thumbnail_url)
                                    <img src="{{ $recipe->thumbnail_url }}" alt="{{ $recipe->title }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <svg class="h-20 w-20 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif

                                <!-- Бейдж пользователя -->
                                <div class="absolute top-3 left-3 bg-white/90 backdrop-blur-sm text-green-600 text-xs font-bold px-3 py-1.5 rounded-full shadow-md flex items-center">
                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    <span>{{ $recipe->user ? $recipe->user->shortName() : 'Пользователь' }}</span>
                                </div>

                                <!-- Категория -->
                                <div class="absolute top-3 right-3">
                                    <span class="bg-green-500 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-md">
                                        {{ $recipe->type?->label() ?? 'Рецепт' }}
                                    </span>
                                </div>
                            </div>

                            <div class="p-5 flex flex-col flex-grow">
                                <h3 class="text-lg font-bold text-green-600 mb-2 line-clamp-2 h-14">
                                    {{ $recipe->title }}
                                </h3>

                                <p class="text-gray-600 mb-4 line-clamp-3 h-16 text-sm">
                                    {{ Str::limit($recipe->description, 100) }}
                                </p>

                                <div class="mt-auto">
                                    <a href="{{ route('shop.show-user', $recipe) }}"
                                       class="block w-full text-center bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-semibold py-2 px-4 rounded-xl transition duration-200 shadow-md hover:shadow-lg">
                                        Смотреть рецепт
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Пагинация -->
                <div class="mt-12">
                    {{ $userRecipes->links() }}
                </div>
            @else
                <!-- Пустое состояние -->
                <div class="bg-white rounded-2xl shadow-lg p-16 text-center">
                    <svg class="w-24 h-24 mx-auto text-gray-300 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h3 class="text-2xl font-bold text-gray-700 mb-3">Пока нет рецептов</h3>
                    <p class="text-gray-500 mb-8 max-w-md mx-auto">
                        Будьте первым, кто поделится своим кулинарным шедевром с нашим сообществом!
                    </p>
                    <a href="{{ route('shop.create-advice') }}"
                       class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-bold rounded-full shadow-lg hover:shadow-xl transition duration-300">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Добавить свой рецепт
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
