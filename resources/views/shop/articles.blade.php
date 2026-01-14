@extends('layouts.shop')

@section('title', 'Статьи - Вкусняшка')
@section('content')

    <div class="bg-green-100">

        <div class="container mx-auto px-4 py-10">

            <h1 class="text-5xl font-bold text-green-500  mt-6">Интересное о кулинарии</h1>

        <div class="grid grid-cols-2 gap-6 lg:grid-cols-2 md:grid-cols-1 sm:grid-cols-1 mt-6">
            <!-- Блок 1: Интересное о кулинарии -->
            <div class="bg-green-200  rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 ease-out transform hover:translate-x-1 flex flex-row ">
                <div class="p-6">
                    <h2 class="text-green-500 text-2xl font-bold mb-2 ">Личи: это фрукт или ягода </h2>
                    <h2 class="text-gray-700 text-2xl font-bold">Экзотический фрукт: история и состав</h2>
                    <div>
                        <a href="/article_1">
                            <button type="submit" class="mt-8 w-full sm:w-auto bg-gradient-to-br from-lime-200 to-green-500 hover:from-green-600 hover:to-lime-400 text-white font-semibold py-2 px-6 rounded-lg transition duration-150 ease-in-out">
                                Подробнее
                            </button>
                        </a>
                    </div>
                </div>
                <img src="{{ asset('/assets/gifs/Личи.jpg2.jpg') }}" alt="" class="w-52  h-auto rounded-xl m-6 shadow-md object-cover">
            </div>


        <div class="bg-orange-300  rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 ease-out transform hover:translate-x-1 flex flex-row ">
            <div class="p-6">
                <h2 class="text-white text-2xl font-bold mb-2 ">Витамины в рыбе: что важно знать  </h2>
                <h2 class="text-gray-700 text-2xl font-bold">Рассказываем, может ли рыба сохранить людям здоровье</h2>
                <div>
                    <a href="/article_2">
                        <button type="submit" class="mt-8 w-full sm:w-auto bg-gradient-to-br from-lime-200 to-green-500 hover:from-green-600 hover:to-lime-400 text-white font-semibold py-2 px-6 rounded-lg transition duration-150 ease-in-out">
                            Подробнее
                        </button>
                    </a>
                </div>
            </div>
            <img src="{{ asset('/assets/gifs/Витамины в рыбе.jpg2.jpg') }}" alt="" class="w-52  h-auto rounded-xl m-6 shadow-md object-cover">
        </div>

            <div class="bg-orange-300  rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 ease-out transform hover:translate-x-1 flex flex-row ">
                <div class="p-6">
                    <h2 class="text-white text-2xl font-bold mb-2 ">Листья смородины: польза и вред  </h2>
                    <h2 class="text-gray-700 text-2xl font-bold">В смородиновых листьях много полезных веществ, которые сохраняют здоровье. </h2>
                    <div>
                        <a href="/article_3" class="text-green-500 hover:text-white transition duration 150 ease-in-out">
                            <button type="submit" class="mt-8 w-full sm:w-auto bg-gradient-to-br from-lime-200 to-green-500 hover:from-green-600 hover:to-lime-400 text-white font-semibold py-2 px-6 rounded-lg transition duration-150 ease-in-out">
                                Подробнее
                            </button>
                        </a>
                    </div>
                </div>
                <img src="{{ asset('/assets/gifs/смородина.jpg') }}" alt="" class="w-52  h-auto rounded-xl m-6 shadow-md object-cover">
            </div>

            <div class="bg-green-200  rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 ease-out transform hover:translate-x-1 flex flex-row ">
                <div class="p-6">
                    <h2 class="text-green-500 text-2xl font-bold mb-2 ">Рамбутан: что это за фрукт  </h2>
                    <h2 class="text-gray-700 text-2xl font-bold">Знаете, что такое рамбутан? Узнаете его на прилавке в магазине? </h2>
                    <div>
                        <a href="/article_4" class="text-green-500 hover:text-white transition duration 150 ease-in-out">
                            <button type="submit" class="mt-8 w-full sm:w-auto bg-gradient-to-br from-lime-200 to-green-500 hover:from-green-600 hover:to-lime-400 text-white font-semibold py-2 px-6 rounded-lg transition duration-150 ease-in-out">
                                Подробнее
                            </button>
                        </a>
                    </div>
                </div>
                <img src="{{ asset('/assets/gifs/Рамбутан.jpg 2.jpg') }}" alt="" class="w-52  h-auto rounded-xl m-6 shadow-md object-cover">
            </div>

            <div class="bg-green-200  rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 ease-out transform hover:translate-x-1 flex flex-row ">
                <div class="p-6">
                    <h2 class="text-green-500 text-2xl font-bold mb-2 ">Мандарины на Новый год! Какие бывают, как выбрать и что из них приготовит? </h2>
                    <h2 class="text-gray-700 text-2xl font-bold">Невозможно представить Новый год без мандаринов, согласны? </h2>
                    <div>
                        <a href="/articles" class="text-green-500 hover:text-white transition duration 150 ease-in-out">
                            <button type="submit" class="mt-8 w-full sm:w-auto bg-gradient-to-br from-lime-200 to-green-500 hover:from-green-600 hover:to-lime-400 text-white font-semibold py-2 px-6 rounded-lg transition duration-150 ease-in-out">
                                Подробнее
                            </button>
                        </a>
                    </div>
                </div>
                <img src="{{ asset('/assets/gifs/мандарин.jpg') }}" alt="" class="w-52  h-auto rounded-xl m-6 shadow-md object-cover">
            </div>

            <div class="bg-orange-300  rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 ease-out transform hover:translate-x-1 flex flex-row ">
                <div class="p-6">
                    <h2 class="text-white text-2xl font-bold mb-2 ">Лучшие сочетания яблок с другими продуктами   </h2>
                    <h2 class="text-gray-700 text-2xl font-bold">«Яблоко на ужин — врач не нужен!» — гласит русская народная мудрость.  </h2>
                    <div>
                        <a href="/articles" class="text-green-500 hover:text-white transition duration 150 ease-in-out">
                            <button type="submit" class="mt-8 w-full sm:w-auto bg-gradient-to-br from-lime-200 to-green-500 hover:from-green-600 hover:to-lime-400 text-white font-semibold py-2 px-6 rounded-lg transition duration-150 ease-in-out">
                                Подробнее
                            </button>
                        </a>
                    </div>
                </div>
                <img src="{{ asset('/assets/gifs/яблоко.jpg') }}" alt="" class="w-52  h-auto rounded-xl m-6 shadow-md object-cover">
            </div>

            <div class="bg-orange-300  rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 ease-out transform hover:translate-x-1 flex flex-row ">
                <div class="p-6">
                    <h2 class="text-white text-2xl font-bold mb-2 ">Мясо кролика: чем полезно и как готовить    </h2>
                    <h2 class="text-gray-700 text-2xl font-bold">Помните фразу из выступления известных юмористов?  </h2>
                    <div>
                        <a href="/articles" class="text-green-500 hover:text-white transition duration 150 ease-in-out">
                            <button type="submit" class="mt-8 w-full sm:w-auto bg-gradient-to-br from-lime-200 to-green-500 hover:from-green-600 hover:to-lime-400 text-white font-semibold py-2 px-6 rounded-lg transition duration-150 ease-in-out">
                                Подробнее
                            </button>
                        </a>
                    </div>
                </div>
                <img src="{{ asset('/assets/gifs/кролик.jpeg') }}" alt="" class="w-52  h-auto rounded-xl m-6 shadow-md object-cover">
            </div>

            <div class="bg-green-200  rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 ease-out transform hover:translate-x-1 flex flex-row ">
                <div class="p-6">
                    <h2 class="text-green-500 text-2xl font-bold mb-2 ">Вёшенки и шампиньоны: что полезнее  </h2>
                    <h2 class="text-gray-700 text-2xl font-bold">Знаете поговорку: «Гриб грибу — рознь»? Чем отличаются?  </h2>
                    <div>
                        <a href="/articles" class="text-green-500 hover:text-white transition duration 150 ease-in-out">
                            <button type="submit" class="mt-8 w-full sm:w-auto bg-gradient-to-br from-lime-200 to-green-500 hover:from-green-600 hover:to-lime-400 text-white font-semibold py-2 px-6 rounded-lg transition duration-150 ease-in-out">
                                Подробнее
                            </button>
                        </a>
                    </div>
                </div>
                <img src="{{ asset('/assets/gifs/грибы1.jpg') }}" alt="" class="w-52  h-auto rounded-xl m-6 shadow-md object-cover">
            </div>

        </div>
    </div>
@endsection

