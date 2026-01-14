@extends('layouts.shop')

@section('title', 'Каталог рецептов - Вкусняшка')
@section('content')


        <script src="https://cdn.tailwindcss.com"></script>
        <div class="bg-green-100 h-screen flex">
        <body class="bg-gray-100 font-sans leading-normal tracking-normal">


        <div class="container mx-auto px-4 py-8 ">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">
                Слайдер изображений
            </h1>

            <!-- Контейнер слайдера -->
            <div class="relative w-full overflow-hidden rounded-lg shadow-md" style="height: 700px;">
                <!-- Слайды (картинки) -->
                <div id="slides" class="flex transition-transform duration-500 ease-in-out" style="width: auto;">
                    <div class="w-full flex-shrink-0">
                        <img src="{{ asset('/assets/gifs/photo_2026-01-14_17-54-45.jpg') }}" alt="Изображение 1" class="w-full h-full object-cover">
                    </div>
                    <div class="w-full flex-shrink-0">
                        <img src="{{ asset('/assets/gifs/photo_2026-01-14_17-54-38.jpg') }}" alt="Изображение 2" class="w-full h-full object-cover">
                    </div>
                    <div class="w-full flex-shrink-0">
                        <img src="{{ asset('/assets/gifs/мандарин.jpg') }}" alt="Изображение 3" class="w-full h-full object-cover">
                    </div>
                </div>

                <!-- Кнопки навигации -->
                <button
                    id="prevBtn"
                    class="absolute top-1/2 left-4 -translate-y-1/2 bg-white bg-opacity-75 hover:bg-opacity-100 text-gray-800 p-2 rounded-full shadow-md focus:outline-none">
                    ❮
                </button>
                <button
                    id="nextBtn"
                    class="absolute top-1/2 right-4 -translate-y-1/2 bg-white bg-opacity-75 hover:bg-opacity-100 text-gray-800 p-2 rounded-full shadow-md focus:outline-none">
                    ❯
                </button>

                <!-- Индикаторы (точки) -->
                <div id="indicators" class="absolute bottom-4 left-1/2 -translate-x-1/2 flex space-x-3">
                    <!-- Точки будут добавлены JS -->
                </div>
            </div>
        </div>

        <script>
            // Элементы DOM
            const slides = document.getElementById('slides');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('indicators');
            const indicators = document.getElementById('indicators');


            // Параметры слайдера
            let currentIndex = 0;
            const slideCount = 3; // Количество слайдов
            const slideWidth = 100; // Ширина одного слайда в %


            // Создаём индикаторы (точки)
            function renderIndicators() {
                for (let i = 0; i < slideCount; i++) {
                    const dot = document.createElement('div');
                    dot.className = `w-3 h-3 rounded-full bg-gray-400 cursor-pointer ${i === currentIndex ? 'bg-blue-600' : ''}`;
                    dot.addEventListener('click', () => goToSlide(i));
                    indicators.appendChild(dot);
                }
            }

            // Перемещение к слайду
            function goToSlide(index) {
                if (index < 0) index = slideCount - 1;
                if (index >= slideCount) index = 0;


                currentIndex = index;
                slides.style.transform = `translateX(-${currentIndex * slideWidth}%)`;


                // Обновляем индикаторы
                document.querySelectorAll('#indicators div').forEach((dot, i) => {
                    dot.className = `w-3 h-3 rounded-full bg-gray-400 cursor-pointer ${i === currentIndex ? 'bg-blue-600' : ''}`;
                });
            }

            // Следующий слайд
            function nextSlide() {
                goToSlide(currentIndex + 1);
            }

            // Предыдущий слайд
            function prevSlide() {
                goToSlide(currentIndex - 1);
            }

            // Автопрокрутка (опционально)
            function autoSlide() {
                nextSlide();
            }
            // Запускаем автопрокрутку каждые 4 секунды
            setInterval(autoSlide, 4000);


            // Обработчики событий
            nextBtn.addEventListener('click', nextSlide);
            prevBtn.addEventListener('click', prevSlide);


            // Инициализация
            renderIndicators();
            goToSlide(0); // Показываем первый слайд
        </script>
        </body>

    </div>
@endsection
