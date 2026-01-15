@extends('layouts.shop')

@section('title', 'Гланая - Вкусняшка')
@section('content')
    <div class="bg-green-100">
    <div class="bg-green-100  text-green-500/90 " xmlns="http://www.w3.org/1999/html">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-2 gap-10">
                <div class="...">
                <img src="{{ asset('/assets/gifs/photo_t.png') }}">
                    </div>

                <div class="col-span ...">
                <h1 class="text-4xl md:text-5xl font-bold mt-8">"После хорошего обеда можно простить кого угодно,</h1>
                    <h1 class="text-4xl text-gray-700 md:text-5xl font-bold mb-4"> даже своих родственников!"</h1>
                    </div>
            </div>
        </div>
    </div>


    	<div class="container bg-green-100 mx-auto px-4 py-10">

        	  <div class="flex flex-col items-center">
            	    <h1 class="text-gray-700 text-4xl font-bold mb-6">На этом сайте</h1>
            	    <h2 class="text-green-500 text-4xl font-bold mb-10">Вы найдете и научитесь:</h2>
            	  </div>

        	  <div class="grid grid-cols-3 gap-10 sm:cols-2">

                  <div class="">
                      <img src="{{ asset('/assets/gifs/result.png') }}" class="w-32 h-full bg-cover opacity-0">
                  </div>


                <!-- Карточка «Разнообразие блюд» -->
            	    <div class="bg-white p-6 rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 ease-out transform hover:translate-x-1">
                        <div class="flex-column mb-4">
                	      <div class="w-12 h-full">
                              <img src="{{ asset('/assets/gifs/cuisine_12562852.png') }}">
                          </div>
                              <h3 class="text-green-500 text-xl font-bold">Разнообразие блюд</h3>
                      <p class="text-gray-600 text-xl  ">Больше не придется есть одно и тоже. Вы найдете множество рецептов на самый разный вкус.</p>
                        </div>
              </div>

                <!-- Карточка «Простота приготовления» -->
            	    <div class="bg-white p-6 rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 ease-out transform hover:translate-x-1">
                        <div class="flex-column mb-4">
                            <div class="w-12 h-full">
                            <img src="{{ asset('/assets/gifs/img.png') }}">
                          </div>
                              <h3 class="text-xl text-green-500 font-bold">Простота приготовления</h3>
                	      <p class="text-gray-600 text-xl">Благодаря пошаговым описаниям рецептов, осилить их сможет даже новичок в кулинарии. </p>
                	    </div>
              </div>

            	    <!-- Карточка «Удобство использования» -->
                <div class="bg-white p-6 rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 ease-out transform  translate-x-1/2">
                    <div class="flex-column mb-4">
                        <div class="w-12 h-full">
                        <img src="{{ asset('/assets/gifs/photo_2026-01-11_18-47-00.jpg') }}">
                          </div>
                              <h3 class="text-xl text-green-500 font-bold">Удобство использования</h3>
                	      <p class="text-gray-600 text-xl">Вам не надо придумывать, что приготовить. Как разнообразить ваше привычное меню на обед!</p>
                	    </div>
                </div>

            	    <!-- Карточка «Доступность» -->
            	    <div class="bg-white p-6 rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 ease-out transform  translate-x-1/2">
                        <div class="flex-column mb-4">
                            <div class="w-12 h-full">
                            <img src="{{ asset('/assets/gifs/photo_2026-01-11_18-46-48.jpg') }}">
                          </div>
                              <h3 class="text-xl text-green-500 font-bold">Доступность</h3>
                	      <p class="text-gray-600 text-xl">А ингредиенты для готовки найдутся в любом магазине у дома.</p>
                	    </div>
              </div>


                      <div class="rounded-xl overflow-hidden w-72 h-full bg-cover translate-x-1 opacity-0">
                          <img src="{{ asset('/assets/gifs/photo_2026-01-09_23-16-08.jpg') }}">
                      </div>
            	  </div>
        </div>


        <div class="container mx-auto px-4 py-10">
            <!-- Заголовок -->
            <div class="mb-10">
                <button class="bg-green-500 text-white px-6 py-3 rounded-full shadow-xl text-xl">Рецепты и меню на Новый год 2026</button>
                <h1 class="text-4xl font-bold text-gray-700  mt-4">Что приготовить на Новый год – проверенные рецепты и меню</h1>
            </div>

            <!-- Grid с блоками преимуществ -->
            <div class="grid grid-cols-3 gap-6 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
                <!-- Блок 1: Интересное о кулинарии -->
                <div class="col-span-2  bg-green-200  rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 ease-out transform hover:translate-x-1 flex flex-row ">
                        <div class="p-16 ">
                    <h2 class="text-green-500 text-3xl font-bold mb-2 ">Интересное о кулинарии </h2>
                    <p class="text-gray-700 text-lg">В Китае распространён особый способ приготовления яиц — их долго варят в пряном отваре с добавлением чая и специй.</p>
                            <div>
                                <a href="/articles" class="text-green-500 hover:text-white transition duration 150 ease-in-out">
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
                   Вы можете расчитать суточную норму каллорий, для любого человека </h2>
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
                <div class="col-span-2 bg-green-200  rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 ease-out transform hover:translate-x-1 flex flex-row">
                    <div class="p-16 ">
                        <h2 class="text-green-500 text-3xl font-bold mb-2 ">Самые популярные подборки рецептов </h2>
                        <p class="text-gray-700 text-lg">Быстрые и простые рецепты на каждый день для всей семьи.

                        </p>
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
        <button id="scroll-to-top" onclick="scrollToTop()" class=" hidden opacity-0 translate-y-4 fixed bottom-6 right-6 z-50  w-12  h-12  rounded-full bg-green-500 text-white  shadow-lg  hover:bg-green-700  transition-all duration-300  ease-in-out">
            ↑ </button>
    </div>



    <script>
        const btn = document.getElementById('scroll-to-top');

        window.addEventListener('scroll', () => {
             if (window.pageYOffset > 400) {
                 btn.classList.remove('hidden', 'opacity-0', 'translate-y-4');
                 btn.classList.add('opacity-100', 'translate-y-0');
                 } else {
                btn.classList.add('hidden', 'opacity-0', 'translate-y-4');
                btn.classList.remove('opacity-100', 'translate-y-0');
                 }
            });

        function scrollToTop() {
             window.scrollTo({ top: 0, behavior: 'smooth' });
              }
        </script>


@endsection
