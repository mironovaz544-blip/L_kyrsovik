@extends('layouts.shop')

@section('title', 'Каталог рецептов - Вкусняшка')

@section('content')
    <div class="bg-green-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h2 class="text-4xl font-bold text-green-500 mb-2">Мы предоставляем</h2>
                    <p class="text-gray-600 text-xl">Выберите из нашего широкого ассортимента рецептов</p>
                </div>
                <div class="flex items-center space-x-4">
                    {{-- Форма фильтрации и поиска --}}
                    <form action="{{ route('recept.index') }}" method="GET" id="filterForm" class="flex items-center space-x-4">
                        {{-- Поле поиска --}}
                        <div class="relative">
                            <input type="text"
                                   name="search"
                                   value="{{ request('search') }}"
                                   placeholder="Поиск рецептов..."
                                   class="px-4 py-2 pl-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 w-64"
                                   autocomplete="off">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center px-3 text-gray-500">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                            @if(request('search'))
                                <a href="{{ route('recept.index', array_merge(request()->except('search', 'page'))) }}"
                                   class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-400 hover:text-gray-600">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </a>
                            @endif
                        </div>

                        {{-- Фильтр по категории --}}
                        <div class="relative">
                            <select name="category"
                                    class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 appearance-none bg-white pr-10"
                                    onchange="this.form.submit()">
                                <option value="">Все категории</option>
                                @foreach(\App\Enums\RecipeTypeEnum::cases() as $type)
                                    <option value="{{ $type->value }}"
                                        {{ request('category') == $type->value ? 'selected' : '' }}>
                                        {{ $type->label() }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                </svg>
                            </div>
                        </div>

                        {{-- Сортировка --}}
                        <div class="relative">
                            <select name="sort"
                                    class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 appearance-none bg-white pr-10"
                                    onchange="this.form.submit()">
                                <option value="">Сортировка</option>
                                <option value="type_asc" {{ request('sort') == 'type_asc' ? 'selected' : '' }}>По категории (А-Я)</option>
                                <option value="type_desc" {{ request('sort') == 'type_desc' ? 'selected' : '' }}>По категории (Я-А)</option>
                                <option value="title_asc" {{ request('sort') == 'title_asc' ? 'selected' : '' }}>По названию (А-Я)</option>
                                <option value="title_desc" {{ request('sort') == 'title_desc' ? 'selected' : '' }}>По названию (Я-А)</option>
                                <option value="rating_asc" {{ request('sort') == 'rating_asc' ? 'selected' : '' }}>По рейтингу (↓)</option>
                                <option value="rating_desc" {{ request('sort') == 'rating_desc' ? 'selected' : '' }}>По рейтингу (↑)</option>
                                <option value="created_at_desc" {{ request('sort') == 'created_at_desc' ? 'selected' : '' }}>Сначала новые</option>
                                <option value="created_at_asc" {{ request('sort') == 'created_at_asc' ? 'selected' : '' }}>Сначала старые</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                </svg>
                            </div>
                        </div>

                        {{-- Кнопка поиска и сброса --}}
                        <div class="flex space-x-2">
                            <button type="submit"
                                    class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition duration-150 flex items-center">
                                <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                                Найти
                            </button>

                            @if(request()->hasAny(['category', 'sort', 'search']))
                                <a href="{{ route('recept.index') }}"
                                   class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition duration-150 flex items-center">
                                    <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                    </svg>
                                    Сбросить
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

            {{-- Показать активные фильтры и поиск --}}
            @if(request()->hasAny(['category', 'search']))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            @if(request('category'))
                                <div class="flex items-center">
                                    <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                    </svg>
                                    <span class="text-green-700">
                                        Категория:
                                        <span class="font-semibold">
                                            {{ \App\Enums\RecipeTypeEnum::tryFrom(request('category'))?->label() ?? 'Неизвестная категория' }}
                                        </span>
                                    </span>
                                </div>
                            @endif

                            @if(request('search'))
                                <div class="flex items-center">
                                    <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                    <span class="text-green-700">
                                        Поиск:
                                        <span class="font-semibold">"{{ request('search') }}"</span>
                                    </span>
                                </div>
                            @endif
                        </div>
                        <span class="text-sm text-green-600">
                            Найдено: {{ $recipes->total() }} рецептов
                        </span>
                    </div>
                </div>
            @endif

            {{-- Быстрые фильтры по категориям --}}
            <div class="mb-6">
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('recept.index', request()->except('category', 'page')) }}"
                       class="px-3 py-1 rounded-full text-sm {{ !request()->has('category') ? 'bg-green-500 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                        Все рецепты
                    </a>
                    @foreach(\App\Enums\RecipeTypeEnum::cases() as $type)
                        @php
                            $recipeCount = isset($categoryCounts[$type->value]) ? $categoryCounts[$type->value] : \App\Models\Recipe::where('type', $type->value)->count();
                        @endphp
                        @if($recipeCount > 0)
                            <a href="{{ route('recept.index', array_merge(request()->except('category', 'page'), ['category' => $type->value])) }}"
                               class="px-3 py-1 rounded-full text-sm {{ request('category') == $type->value ? 'bg-green-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                                {{ $type->label() }}
                                <span class="ml-1 text-xs opacity-75">({{ $recipeCount }})</span>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>

            @if($recipes->isEmpty())
                <div class="text-center py-16">
                    <svg class="mx-auto h-24 w-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                    </svg>
                    <h3 class="mt-4 text-xl font-semibold text-gray-900">
                        @if(request()->has('search'))
                            Рецепты по запросу "{{ request('search') }}" не найдены
                        @elseif(request()->has('category'))
                            Рецепты в категории "{{ \App\Enums\RecipeTypeEnum::tryFrom(request('category'))?->label() ?? 'Неизвестная категория' }}" не найдены
                        @else
                            Рецепты не найдены
                        @endif
                    </h3>
                    <p class="mt-2 text-gray-600">
                        @if(request()->hasAny(['search', 'category']))
                            Попробуйте изменить параметры поиска
                        @else
                            В данный момент рецепты отсутствуют в каталоге
                        @endif
                    </p>
                    @if(request()->hasAny(['search', 'category']))
                        <a href="{{ route('recept.index') }}"
                           class="mt-4 inline-flex items-center px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">
                            Показать все рецепты
                        </a>
                    @endif
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6">
                    @foreach($recipes as $recipe)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300 ease-out transform hover:translate-x-1">
                            <div class="h-48 bg-gradient-to-br from-lime-200 to-green-500 flex items-center justify-center">
                                @if($recipe->thumbnail_url)
                                    <img src="{{ $recipe->thumbnail_url }}" alt="{{ $recipe->title }}" class="w-full h-full object-cover">
                                @else
                                    <svg class="h-20 w-20 text-white opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                    </svg>
                                @endif
                            </div>
                            <div class="p-4">
                                <div class="mb-2">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-gray-700">
                                        {{ $recipe->type?->label() ?? 'Рецепт' }}
                                    </span>
                                </div>
                                <h3 class="text-lg font-semibold text-green-500 mb-2 line-clamp-2">
                                    {{ $recipe->title }}
                                </h3>
                                <div class="mb-3">
                                    <x-rating-stars :rating="$recipe->reviews_avg_rating ?? 0" :count="$recipe->reviews_count ?? 0" size="sm" />
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
                        {{ $recipes->withQueryString()->links() }}
                    </div>
                @endif
            @endif
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterForm = document.getElementById('filterForm');

            // Авто-отправка формы при вводе с задержкой (debounce)
            const searchInput = document.querySelector('input[name="search"]');
            if (searchInput) {
                let timeout = null;
                searchInput.addEventListener('input', function() {
                    clearTimeout(timeout);
                    timeout = setTimeout(() => {
                        if (this.value.length >= 1 || this.value.length === 0) {
                            filterForm.submit();
                        }
                    }, 500);
                });
            }

            // Убираем дублирование параметров при отправке формы
            filterForm.addEventListener('submit', function(e) {
                // Удаляем пустые поля
                const inputs = this.querySelectorAll('input, select');
                inputs.forEach(input => {
                    if (!input.value) {
                        input.disabled = true;
                    }
                });
            });
        });
    </script>
@endsection
