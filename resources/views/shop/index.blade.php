@extends('layouts.shop')

@section('title', 'Главная - Вкусняшка')

@section('content')
    <div class="bg-green-100">

        {{-- СЛАЙДЕР ПОСЛЕДНИХ СТАТЕЙ --}}
        @if($latestArticles->isNotEmpty())
            <div class="w-full bg-gradient-to-b from-green-100 to-white">
                <!-- Слайдер на всю ширину с ограниченным контентом -->
                <div class="relative w-full" id="article-slider">
                    <!-- Слайды -->
                    <div class="overflow-hidden">
                        <div id="slider-track" class="flex transition-transform duration-500 ease-out">
                            @foreach($latestArticles as $article)
                                <div class="w-full flex-shrink-0 relative h-[600px] lg:h-[700px]">
                                    <!-- Фоновое изображение на всю ширину -->
                                    @if($article->thumbnail_url)
                                        <img src="{{ $article->thumbnail_url }}"
                                             alt="{{ $article->title }}"
                                             class="absolute inset-0 w-full h-full object-cover">
                                    @else
                                        <div class="absolute inset-0 bg-gradient-to-br from-lime-200 to-green-400">
                                            <!-- Паттерн для фона -->
                                            <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23000000' fill-opacity='0.2'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
                                        </div>
                                    @endif

                                    <!-- Градиентное затемнение -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent"></div>

                                    <!-- Контент с ограниченной шириной по центру -->
                                    <div class="absolute inset-0 flex items-center">
                                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                                            <div class="max-w-4xl text-white">

                                                <!-- Заголовок с тенью -->
                                                <h3 class="text-5xl lg:text-7xl font-bold mb-6 leading-tight drop-shadow-lg">
                                                    {{ $article->title }}
                                                </h3>

                                                <!-- Концепция -->
                                                <p class="text-xl lg:text-2xl text-gray-200 mb-10 max-w-3xl leading-relaxed drop-shadow">
                                                    {{ $article->concept ?? 'Описание отсутствует' }}
                                                </p>

                                                <!-- Мета-информация и кнопка -->
                                                <div class="flex flex-col sm:flex-row sm:items-center space-y-4 sm:space-y-0 sm:space-x-8">
                                                    <div class="flex items-center space-x-6">
                                                        <span class="text-base text-gray-300 flex items-center">
                                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                            </svg>
                                                            {{ $article->created_at->format('d.m.Y') }}
                                                        </span>

                                                        <span class="text-base text-gray-300 flex items-center">
                                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                            </svg>
                                                            {{ rand(100, 999) }} просмотров
                                                        </span>
                                                    </div>

                                                    <a href="{{ route('shop.show-article', $article) }}"
                                                       class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-lime-400 to-green-500 hover:from-green-600 hover:to-lime-400 text-white text-lg font-medium rounded-xl transition-all duration-300 shadow-2xl hover:shadow-3xl transform hover:scale-105 group">
                                                        <span>Читать статью</span>
                                                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Декоративные элементы -->
                                    <div class="absolute top-8 right-8 text-white/10 text-9xl font-bold select-none">
                                        {{ sprintf('%02d', $loop->iteration) }}
                                    </div>

                                    <!-- Прогресс-бар для автоплея -->
                                    <div class="absolute bottom-0 left-0 right-0 h-1 bg-white/30">
                                        <div class="h-full bg-green-500 progress-bar" style="width: 0%;"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Кнопки навигации (большие и стильные) -->
                    <button id="prev-slide"
                            class="absolute left-8 top-1/2 -translate-y-1/2 w-16 h-16 bg-white/95 hover:bg-white rounded-full shadow-2xl flex items-center justify-center transition-all duration-300 hover:scale-110 hover:shadow-3xl disabled:opacity-50 disabled:cursor-not-allowed z-20 group">
                        <svg class="w-8 h-8 text-green-600 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>

                    <button id="next-slide"
                            class="absolute right-8 top-1/2 -translate-y-1/2 w-16 h-16 bg-white/95 hover:bg-white rounded-full shadow-2xl flex items-center justify-center transition-all duration-300 hover:scale-110 hover:shadow-3xl disabled:opacity-50 disabled:cursor-not-allowed z-20 group">
                        <svg class="w-8 h-8 text-green-600 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>

                    <!-- Улучшенные индикаторы -->
                    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex space-x-3 z-20">
                        @foreach($latestArticles as $index => $article)
                            <button class="slider-dot w-4 h-4 rounded-full transition-all duration-300 {{ $loop->first ? 'w-16 bg-green-500' : 'bg-white/50 hover:bg-white' }}"
                                    data-index="{{ $index }}">
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        {{-- СЕКЦИЯ ПОИСКА РЕЦЕПТОВ --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="flex flex-col items-center justify-center">
                <div class="text-center mb-10">
                    <h2 class="text-4xl font-bold text-green-500 mb-4">Найди свой идеальный рецепт</h2>
                    <p class="text-gray-600 text-xl">Тысячи рецептов на любой вкус</p>
                </div>

                {{-- Форма поиска --}}
                <form action="{{ route('recept.index') }}" method="GET" class="w-full max-w-3xl">
                    <div class="flex flex-col md:flex-row gap-4 items-center">
                        <div class="relative flex-grow w-full">
                            <input type="text"
                                   name="search"
                                   value="{{ request('search') }}"
                                   placeholder="Введите название рецепта или первую букву..."
                                   class="w-full px-6 py-4 pl-14 border-2 border-gray-300 rounded-full focus:outline-none focus:ring-4 focus:ring-green-500 focus:border-green-500 text-lg shadow-lg"
                                   autocomplete="off"
                                   required>
                            <div class="absolute inset-y-0 left-0 flex items-center pl-5 text-gray-500">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                        </div>
                        <button type="submit"
                                class="px-8 py-4 bg-gradient-to-br from-lime-200 to-green-500 hover:from-green-600 hover:to-lime-400 text-white font-bold rounded-full shadow-lg hover:shadow-xl transition duration-300 ease-in-out text-lg flex items-center gap-2 whitespace-nowrap">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            Найти рецепты
                        </button>
                    </div>

                    <div class="flex justify-center mt-6 gap-4 flex-wrap">
                        <span class="text-gray-600">Популярные запросы:</span>
                        <a href="{{ route('recept.index', ['search' => 'Салат']) }}" class="text-green-600 hover:text-green-800 hover:underline">Салат</a>
                        <a href="{{ route('recept.index', ['search' => 'Десерты']) }}" class="text-green-600 hover:text-green-800 hover:underline">Десерты</a>
                        <a href="{{ route('recept.index', ['search' => 'Мясо']) }}" class="text-green-600 hover:text-green-800 hover:underline">Мясо</a>
                        <a href="{{ route('recept.index', ['search' => 'Курица']) }}" class="text-green-600 hover:text-green-800 hover:underline">Курица</a>
                        <a href="{{ route('recept.index', ['search' => 'Напитки']) }}" class="text-green-600 hover:text-green-800 hover:underline">Напитки</a>
                    </div>
                </form>
            </div>
        </div>

        {{-- НОВЫЙ БЛОК: ПОСЛЕДНИЕ ДОБАВЛЕННЫЕ РЕЦЕПТЫ --}}
        @if($latestRecipes->isNotEmpty())
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="text-center mb-10">
                    <h2 class="text-4xl font-bold text-green-500 mb-4">Новые рецепты</h2>
                    <p class="text-gray-600 text-xl">Свежие рецепты, добавленные нашими пользователями</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($latestRecipes as $recipe)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300 ease-out transform hover:-translate-y-1">
                            <div class="h-48 bg-gradient-to-br from-lime-200 to-green-500 flex items-center justify-center">
                                @if($recipe->thumbnail_url)
                                    <img src="{{ $recipe->thumbnail_url }}" alt="{{ $recipe->title }}" class="w-full h-full object-cover">
                                @else
                                    <svg class="h-20 w-20 text-white opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
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
                                    @php
                                        $rating = $recipe->reviews_avg_rating ?? 0;
                                        $count = $recipe->reviews_count ?? 0;
                                    @endphp
                                    @if($rating > 0)
                                        <div class="flex items-center">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= round($rating))
                                                    <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                                        <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                                    </svg>
                                                @else
                                                    <svg class="w-4 h-4 text-gray-300 fill-current" viewBox="0 0 20 20">
                                                        <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                                    </svg>
                                                @endif
                                            @endfor
                                            <span class="text-xs text-gray-500 ml-1">({{ $count }})</span>
                                        </div>
                                    @else
                                        <div class="flex items-center">
                                            @for($i = 1; $i <= 5; $i++)
                                                <svg class="w-4 h-4 text-gray-300 fill-current" viewBox="0 0 20 20">
                                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                                </svg>
                                            @endfor
                                            <span class="text-xs text-gray-500 ml-1">(0)</span>
                                        </div>
                                    @endif
                                </div>

                                <a href="{{ route('shop.show', $recipe) }}"
                                   class="block w-full text-center bg-gradient-to-br from-lime-200 to-green-500 hover:from-green-600 hover:to-lime-400 text-white font-semibold py-2 px-4 rounded-lg transition duration-150 ease-in-out">
                                    Подробнее
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>


                <div class="text-center mt-10">
                    <a href="{{ route('recept.index') }}"
                       class="inline-flex items-center px-8 py-4 bg-gradient-to-br from-lime-200 to-green-500 hover:from-green-600 hover:to-lime-400 text-white font-bold rounded-full shadow-lg hover:shadow-xl transition duration-300 ease-in-out text-lg">
                        <span>Смотреть все рецепты</span>
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                </div>
            </div>
        @else
            {{-- Если рецептов нет --}}
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="text-center">
                    <h2 class="text-4xl font-bold text-green-500 mb-4">Последние рецепты</h2>
                    <p class="text-gray-600 text-xl mb-8">Свежие рецепты, добавленные нашими пользователями</p>
                    <div class="bg-white rounded-lg p-8 shadow-md">
                        <svg class="h-16 w-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        <p class="text-gray-600 text-lg">Пока нет добавленных рецептов</p>
                    </div>
                </div>
            </div>
        @endif
    <div class="container mx-auto px-4 py-10">
        <!-- Заголовок -->
        <div class="mb-10">
            <button class="bg-green-500 text-white px-6 py-3 rounded-full shadow-xl text-xl">Рецепты и меню на Новый год 2026</button>
            <h1 class="text-4xl font-bold text-gray-700 mt-4">Что приготовить на Новый год – проверенные рецепты и меню</h1>
        </div>

        <!-- Grid с блоками преимуществ -->
        <div class="grid grid-cols-3 gap-6 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
            <!-- Блок 1: Интересное о кулинарии -->
            <div class="col-span-2 bg-green-200 rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 ease-out transform hover:translate-x-1 flex flex-row">
                <div class="p-16">
                    <h2 class="text-green-500 text-3xl font-bold mb-2">Интересное о кулинарии</h2>
                    <p class="text-gray-700 text-lg">В Китае распространён особый способ приготовления яиц — их долго варят в пряном отваре с добавлением чая и специй.</p>
                    <div>
                        <a href="/" class="text-green-500 hover:text-white transition duration 150 ease-in-out">
                            <button type="submit" class="mt-8 w-full sm:w-auto bg-gradient-to-br from-lime-200 to-green-500 hover:from-green-600 hover:to-lime-400 text-white font-semibold py-2 px-6 rounded-lg transition duration-150 ease-in-out">
                                Подробнее
                            </button>
                        </a>
                    </div>
                </div>
                <img src="{{ asset('/assets/gifs/result_4fcdebc7-1e0f-4254-965c-7d14вe2543я06.png') }}" class="w-72 h-full translate-x-1/6">
            </div>

            <!-- Блок 2: Калькулятор каллорий -->
            <div class="bg-orange-300 p-16 rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 ease-out transform hover:translate-x-1">
                <a href="/calculators">
                    <h2 class="text-white hover:text-green-500 text-3xl font-bold mb-2">Калькулятор каллорий
                        Вы можете расчитать суточную норму каллорий, для любого человека</h2>
                </a>
            </div>

            <!-- Блок 3: Кулинарный тест -->
            <div class="bg-lime-300 p-16 rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 ease-out transform hover:translate-x-1">
                <a href="/test">
                    <h2 class="text-gray-800 hover:text-green-500 text-3xl font-bold mb-2">Кулинарный тест
                        проверьте свои знания о кулинарии и ингредиентах!</h2>
                </a>
            </div>

            <!-- Блок 4: Самые популярные подборки рецептов -->
            <div class="col-span-2 bg-green-200 rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 ease-out transform hover:translate-x-1 flex flex-row">
                <div class="p-16">
                    <h2 class="text-green-500 text-3xl font-bold mb-2">Самые популярные подборки рецептов</h2>
                    <p class="text-gray-700 text-lg">Быстрые и простые рецепты на каждый день для всей семьи.</p>
                    <div>
                        <a href="/recept" class="text-green-500 hover:text-white transition duration 150 ease-in-out">
                            <button type="submit" class="mt-8 w-full sm:w-auto bg-gradient-to-br from-lime-200 to-green-500 hover:from-green-600 hover:to-lime-400 text-white font-semibold py-2 px-6 rounded-lg transition duration-150 ease-in-out">
                                Подробнее
                            </button>
                        </a>
                    </div>
                </div>
                <img src="{{ asset('/assets/gifs/dfiio.png') }}" class="w-72 h-full translate-x-1/6">
            </div>
        </div>
    </div>

        <button id="scroll-to-top" onclick="scrollToTop()" class="hidden opacity-0 translate-y-4 fixed bottom-6 right-6 z-50 w-12 h-12 rounded-full bg-green-500 text-white shadow-lg hover:bg-green-700 transition-all duration-300 ease-in-out">
            ↑
        </button>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btn = document.getElementById('scroll-to-top');

            // Скролл для кнопки наверх
            window.addEventListener('scroll', () => {
                if (window.pageYOffset > 400) {
                    btn.classList.remove('hidden', 'opacity-0', 'translate-y-4');
                    btn.classList.add('opacity-100', 'translate-y-0');
                } else {
                    btn.classList.add('hidden', 'opacity-0', 'translate-y-4');
                    btn.classList.remove('opacity-100', 'translate-y-0');
                }
            });
        });

            document.addEventListener('DOMContentLoaded', function() {
            // Элементы слайдера
            const sliderTrack = document.getElementById('slider-track');
            const prevButton = document.getElementById('prev-slide');
            const nextButton = document.getElementById('next-slide');
            const dots = document.querySelectorAll('.slider-dot');

            // Конфигурация
            const totalSlides = {{ $latestArticles->count() }};
            let currentSlide = 0;
            let autoPlayInterval;
            let isTransitioning = false;
            let progressInterval;

            // Время показа слайда (в миллисекундах)
            const slideDuration = 5000; // 5 секунд
            let progress = 0;

            // Функция обновления слайда
            function updateSlide(index) {
            if (isTransitioning) return;

            isTransitioning = true;
            currentSlide = index;

            // Обновляем позицию
            sliderTrack.style.transform = `translateX(-${index * 100}%)`;

            // Обновляем активную точку
            dots.forEach((dot, i) => {
            if (i === index) {
            dot.classList.add('w-16', 'bg-green-500');
            dot.classList.remove('bg-white/50', 'hover:bg-white');
        } else {
            dot.classList.remove('w-16', 'bg-green-500');
            dot.classList.add('bg-white/50', 'hover:bg-white');
        }
        });

            // Сбрасываем прогресс
            resetProgress();

            // Разблокируем после завершения анимации
            setTimeout(() => {
            isTransitioning = false;
        }, 500);
        }

            // Функция сброса прогресс-бара
            function resetProgress() {
            progress = 0;
            updateProgressBar();
        }

            // Функция обновления прогресс-бара
            function updateProgressBar() {
            const progressBar = document.querySelector('.progress-bar');
            if (progressBar) {
            progressBar.style.width = `${progress}%`;
        }
        }

            // Функция запуска прогресс-бара
            function startProgress() {
            stopProgress();
            const intervalTime = 50; // Обновляем каждые 50ms
            const step = (intervalTime / slideDuration) * 100;

            progressInterval = setInterval(() => {
            if (!isTransitioning) {
            progress += step;
            if (progress >= 100) {
            progress = 0;
            nextSlide();
        }
            updateProgressBar();
        }
        }, intervalTime);
        }

            function stopProgress() {
            if (progressInterval) {
            clearInterval(progressInterval);
        }
        }

            // Следующий слайд
            function nextSlide() {
            if (isTransitioning) return;

            if (currentSlide < totalSlides - 1) {
            currentSlide++;
        } else {
            currentSlide = 0;
        }
            updateSlide(currentSlide);
        }

            // Предыдущий слайд
            function prevSlide() {
            if (isTransitioning) return;

            if (currentSlide > 0) {
            currentSlide--;
        } else {
            currentSlide = totalSlides - 1;
        }
            updateSlide(currentSlide);
        }

            // Переход к конкретному слайду
            function goToSlide(index) {
            if (isTransitioning || index === currentSlide) return;
            updateSlide(index);
        }

            // Автоплей
            function startAutoPlay() {
            stopAutoPlay();
            startProgress();
        }

            function stopAutoPlay() {
            stopProgress();
        }

            // Обработчики событий
            nextButton.addEventListener('click', () => {
            stopAutoPlay();
            nextSlide();
            startAutoPlay();
        });

            prevButton.addEventListener('click', () => {
            stopAutoPlay();
            prevSlide();
            startAutoPlay();
        });

            // Обработчики для точек
            dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
            stopAutoPlay();
            goToSlide(index);
            startAutoPlay();
        });
        });

            // Останавливаем автоплей при наведении
            const sliderContainer = document.getElementById('article-slider');
            sliderContainer.addEventListener('mouseenter', stopAutoPlay);
            sliderContainer.addEventListener('mouseleave', startAutoPlay);

            // Обработка свайпов для мобильных
            let touchStartX = 0;
            let touchEndX = 0;

            sliderTrack.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
            stopAutoPlay();
        }, { passive: true });

            sliderTrack.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
            startAutoPlay();
        }, { passive: true });

            function handleSwipe() {
            const swipeThreshold = 50;
            const diff = touchStartX - touchEndX;

            if (Math.abs(diff) > swipeThreshold) {
            if (diff > 0) {
            nextSlide();
        } else {
            prevSlide();
        }
        }
        }

            // Запускаем автоплей
            startAutoPlay();
        });
    </script>
@endsection
