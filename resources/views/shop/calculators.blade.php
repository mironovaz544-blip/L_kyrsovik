@extends('layouts.shop')

@section('title', 'Таблицы мер и весов - Вкусняшка')
@section('content')

    <div class="bg-gradient-to-br from-green-100 to-green-200 min-h-screen py-8 px-4">
        <div class="max-w-7xl mx-auto">
            <!-- Заголовок - ИЗМЕНЕН ЗНАЧОК -->
            <div class="text-center mb-10">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">
                <span class="bg-gradient-to-r from-green-600 to-green-700 bg-clip-text text-transparent flex items-center justify-center gap-3">
                    <span class="text-5xl">⚖️</span> <!-- Вместо 📊 -->
                    Таблицы мер и весов
                </span>
                </h1>
                <p class="text-lg text-green-700 max-w-2xl mx-auto">
                    Удобные таблицы для перевода продуктов из граммов в стаканы, ложки и штуки
                </p>
            </div>

            <!-- Навигация по категориям - ИЗМЕНЕНЫ ВСЕ ЗНАЧКИ -->
            <div class="flex flex-wrap justify-center gap-3 mb-8">
                <button class="category-btn active bg-green-600 text-white px-6 py-3 rounded-full font-semibold shadow-md hover:shadow-lg transform hover:scale-105 transition-all duration-300 flex items-center gap-2" data-category="all">
                    <span class="text-xl">📋</span> <!-- Вместо 🍎 -->
                    Все продукты
                </button>
                <button class="category-btn bg-white text-green-700 px-6 py-3 rounded-full font-semibold shadow-md hover:shadow-lg transform hover:scale-105 transition-all duration-300 flex items-center gap-2" data-category="flour">
                    <span class="text-xl">🌽</span> <!-- Вместо 🌾 -->
                    Мука и крупы
                </button>
                <button class="category-btn bg-white text-green-700 px-6 py-3 rounded-full font-semibold shadow-md hover:shadow-lg transform hover:scale-105 transition-all duration-300 flex items-center gap-2" data-category="dairy">
                    <span class="text-xl">🧀</span> <!-- Вместо 🥛 -->
                    Молочные продукты
                </button>
                <button class="category-btn bg-white text-green-700 px-6 py-3 rounded-full font-semibold shadow-md hover:shadow-lg transform hover:scale-105 transition-all duration-300 flex items-center gap-2" data-category="fats">
                    <span class="text-xl">🫒</span> <!-- Вместо 🧈 -->
                    Масла и жиры
                </button>
                <button class="category-btn bg-white text-green-700 px-6 py-3 rounded-full font-semibold shadow-md hover:shadow-lg transform hover:scale-105 transition-all duration-300 flex items-center gap-2" data-category="sweets">
                    <span class="text-xl">🍬</span> <!-- Вместо 🍯 -->
                    Сладости
                </button>
                <button class="category-btn bg-white text-green-700 px-6 py-3 rounded-full font-semibold shadow-md hover:shadow-lg transform hover:scale-105 transition-all duration-300 flex items-center gap-2" data-category="liquids">
                    <span class="text-xl">💦</span> <!-- Вместо 💧 -->
                    Жидкости
                </button>
                <button class="category-btn bg-white text-green-700 px-6 py-3 rounded-full font-semibold shadow-md hover:shadow-lg transform hover:scale-105 transition-all duration-300 flex items-center gap-2" data-category="fruits">
                    <span class="text-xl">🍒</span> <!-- Вместо 🍎 -->
                    Фрукты и ягоды
                </button>
            </div>

            <!-- Основные таблицы -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                <!-- Таблица 1: Сыпучие продукты - ИЗМЕНЕН ЗНАЧОК -->
                <div class="category-table bg-white rounded-3xl shadow-2xl overflow-hidden transform hover:scale-[1.02] transition-all duration-500" data-category="flour">
                    <div class="bg-gradient-to-r from-green-500 to-green-600 px-6 py-4">
                        <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                            <span class="text-3xl">🌽</span> <!-- Вместо 🌾 -->
                            Сыпучие продукты
                            <span class="text-sm bg-white bg-opacity-20 px-3 py-1 rounded-full ml-auto">⚖️ гр в 250 мл</span>
                        </h2>
                    </div>
                    <div class="p-6">
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                <tr class="border-b-2 border-green-200">
                                    <th class="text-left py-3 px-2 text-green-800 font-bold">Продукт</th>
                                    <th class="text-center py-3 px-2 text-green-800 font-bold">Стакан 250мл</th>
                                    <th class="text-center py-3 px-2 text-green-800 font-bold">Стакан 200мл</th>
                                    <th class="text-center py-3 px-2 text-green-800 font-bold">Ст. ложка</th>
                                    <th class="text-center py-3 px-2 text-green-800 font-bold">Ч. ложка</th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-green-100">
                                <tr class="hover:bg-green-50 transition-colors">
                                    <td class="py-3 px-2 font-medium">Мука пшеничная</td>
                                    <td class="text-center">160</td>
                                    <td class="text-center">130</td>
                                    <td class="text-center">25</td>
                                    <td class="text-center">8</td>
                                </tr>
                                <tr class="hover:bg-green-50 transition-colors">
                                    <td class="py-3 px-2 font-medium">Мука ржаная</td>
                                    <td class="text-center">140</td>
                                    <td class="text-center">110</td>
                                    <td class="text-center">22</td>
                                    <td class="text-center">7</td>
                                </tr>
                                <tr class="hover:bg-green-50 transition-colors">
                                    <td class="py-3 px-2 font-medium">Сахарный песок</td>
                                    <td class="text-center">200</td>
                                    <td class="text-center">160</td>
                                    <td class="text-center">25</td>
                                    <td class="text-center">8</td>
                                </tr>
                                <tr class="hover:bg-green-50 transition-colors">
                                    <td class="py-3 px-2 font-medium">Сахарная пудра</td>
                                    <td class="text-center">180</td>
                                    <td class="text-center">140</td>
                                    <td class="text-center">20</td>
                                    <td class="text-center">7</td>
                                </tr>
                                <tr class="hover:bg-green-50 transition-colors">
                                    <td class="py-3 px-2 font-medium">Соль</td>
                                    <td class="text-center">320</td>
                                    <td class="text-center">260</td>
                                    <td class="text-center">30</td>
                                    <td class="text-center">10</td>
                                </tr>
                                <tr class="hover:bg-green-50 transition-colors">
                                    <td class="py-3 px-2 font-medium">Рис</td>
                                    <td class="text-center">230</td>
                                    <td class="text-center">180</td>
                                    <td class="text-center">25</td>
                                    <td class="text-center">8</td>
                                </tr>
                                <tr class="hover:bg-green-50 transition-colors">
                                    <td class="py-3 px-2 font-medium">Гречка</td>
                                    <td class="text-center">210</td>
                                    <td class="text-center">170</td>
                                    <td class="text-center">25</td>
                                    <td class="text-center">8</td>
                                </tr>
                                <tr class="hover:bg-green-50 transition-colors">
                                    <td class="py-3 px-2 font-medium">Овсяные хлопья</td>
                                    <td class="text-center">100</td>
                                    <td class="text-center">80</td>
                                    <td class="text-center">14</td>
                                    <td class="text-center">5</td>
                                </tr>
                                <tr class="hover:bg-green-50 transition-colors">
                                    <td class="py-3 px-2 font-medium">Манка</td>
                                    <td class="text-center">200</td>
                                    <td class="text-center">160</td>
                                    <td class="text-center">25</td>
                                    <td class="text-center">8</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Таблица 2: Молочные продукты - ИЗМЕНЕН ЗНАЧОК -->
                <div class="category-table bg-white rounded-3xl shadow-2xl overflow-hidden transform hover:scale-[1.02] transition-all duration-500" data-category="dairy">
                    <div class="bg-gradient-to-r from-blue-400 to-blue-500 px-6 py-4">
                        <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                            <span class="text-3xl">🧀</span> <!-- Вместо 🥛 -->
                            Молочные продукты
                            <span class="text-sm bg-white bg-opacity-20 px-3 py-1 rounded-full ml-auto">⚖️ гр/мл</span>
                        </h2>
                    </div>
                    <div class="p-6">
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                <tr class="border-b-2 border-blue-200">
                                    <th class="text-left py-3 px-2 text-blue-800 font-bold">Продукт</th>
                                    <th class="text-center py-3 px-2 text-blue-800 font-bold">Стакан 250мл</th>
                                    <th class="text-center py-3 px-2 text-blue-800 font-bold">Стакан 200мл</th>
                                    <th class="text-center py-3 px-2 text-blue-800 font-bold">Ст. ложка</th>
                                    <th class="text-center py-3 px-2 text-blue-800 font-bold">Ч. ложка</th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-blue-100">
                                <tr class="hover:bg-blue-50 transition-colors">
                                    <td class="py-3 px-2 font-medium">Молоко</td>
                                    <td class="text-center">250</td>
                                    <td class="text-center">200</td>
                                    <td class="text-center">20</td>
                                    <td class="text-center">5</td>
                                </tr>
                                <tr class="hover:bg-blue-50 transition-colors">
                                    <td class="py-3 px-2 font-medium">Сливки</td>
                                    <td class="text-center">250</td>
                                    <td class="text-center">200</td>
                                    <td class="text-center">20</td>
                                    <td class="text-center">5</td>
                                </tr>
                                <tr class="hover:bg-blue-50 transition-colors">
                                    <td class="py-3 px-2 font-medium">Сметана</td>
                                    <td class="text-center">260</td>
                                    <td class="text-center">210</td>
                                    <td class="text-center">25</td>
                                    <td class="text-center">8</td>
                                </tr>
                                <tr class="hover:bg-blue-50 transition-colors">
                                    <td class="py-3 px-2 font-medium">Кефир</td>
                                    <td class="text-center">250</td>
                                    <td class="text-center">200</td>
                                    <td class="text-center">18</td>
                                    <td class="text-center">5</td>
                                </tr>
                                <tr class="hover:bg-blue-50 transition-colors">
                                    <td class="py-3 px-2 font-medium">Йогурт</td>
                                    <td class="text-center">250</td>
                                    <td class="text-center">200</td>
                                    <td class="text-center">20</td>
                                    <td class="text-center">6</td>
                                </tr>
                                <tr class="hover:bg-blue-50 transition-colors">
                                    <td class="py-3 px-2 font-medium">Творог</td>
                                    <td class="text-center">260</td>
                                    <td class="text-center">210</td>
                                    <td class="text-center">25</td>
                                    <td class="text-center">8</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Таблица 3: Масла и жиры - ИЗМЕНЕН ЗНАЧОК -->
                <div class="category-table bg-white rounded-3xl shadow-2xl overflow-hidden transform hover:scale-[1.02] transition-all duration-500" data-category="fats">
                    <div class="bg-gradient-to-r from-yellow-400 to-yellow-500 px-6 py-4">
                        <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                            <span class="text-3xl">🫒</span> <!-- Вместо 🧈 -->
                            Масла и жиры
                            <span class="text-sm bg-white bg-opacity-20 px-3 py-1 rounded-full ml-auto">⚖️ гр/мл</span>
                        </h2>
                    </div>
                    <div class="p-6">
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                <tr class="border-b-2 border-yellow-200">
                                    <th class="text-left py-3 px-2 text-yellow-800 font-bold">Продукт</th>
                                    <th class="text-center py-3 px-2 text-yellow-800 font-bold">Стакан 250мл</th>
                                    <th class="text-center py-3 px-2 text-yellow-800 font-bold">Стакан 200мл</th>
                                    <th class="text-center py-3 px-2 text-yellow-800 font-bold">Ст. ложка</th>
                                    <th class="text-center py-3 px-2 text-yellow-800 font-bold">Ч. ложка</th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-yellow-100">
                                <tr class="hover:bg-yellow-50 transition-colors">
                                    <td class="py-3 px-2 font-medium">Масло растительное</td>
                                    <td class="text-center">240</td>
                                    <td class="text-center">190</td>
                                    <td class="text-center">17</td>
                                    <td class="text-center">5</td>
                                </tr>
                                <tr class="hover:bg-yellow-50 transition-colors">
                                    <td class="py-3 px-2 font-medium">Масло сливочное</td>
                                    <td class="text-center">240</td>
                                    <td class="text-center">190</td>
                                    <td class="text-center">20</td>
                                    <td class="text-center">6</td>
                                </tr>
                                <tr class="hover:bg-yellow-50 transition-colors">
                                    <td class="py-3 px-2 font-medium">Маргарин</td>
                                    <td class="text-center">240</td>
                                    <td class="text-center">190</td>
                                    <td class="text-center">20</td>
                                    <td class="text-center">6</td>
                                </tr>
                                <tr class="hover:bg-yellow-50 transition-colors">
                                    <td class="py-3 px-2 font-medium">Топленое масло</td>
                                    <td class="text-center">240</td>
                                    <td class="text-center">190</td>
                                    <td class="text-center">20</td>
                                    <td class="text-center">6</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Таблица 4: Сладости - ИЗМЕНЕН ЗНАЧОК -->
                <div class="category-table bg-white rounded-3xl shadow-2xl overflow-hidden transform hover:scale-[1.02] transition-all duration-500" data-category="sweets">
                    <div class="bg-gradient-to-r from-pink-400 to-pink-500 px-6 py-4">
                        <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                            <span class="text-3xl">🍬</span> <!-- Вместо 🍯 -->
                            Сладости
                            <span class="text-sm bg-white bg-opacity-20 px-3 py-1 rounded-full ml-auto">⚖️ гр</span>
                        </h2>
                    </div>
                    <div class="p-6">
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                <tr class="border-b-2 border-pink-200">
                                    <th class="text-left py-3 px-2 text-pink-800 font-bold">Продукт</th>
                                    <th class="text-center py-3 px-2 text-pink-800 font-bold">Стакан 250мл</th>
                                    <th class="text-center py-3 px-2 text-pink-800 font-bold">Стакан 200мл</th>
                                    <th class="text-center py-3 px-2 text-pink-800 font-bold">Ст. ложка</th>
                                    <th class="text-center py-3 px-2 text-pink-800 font-bold">Ч. ложка</th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-pink-100">
                                <tr class="hover:bg-pink-50 transition-colors">
                                    <td class="py-3 px-2 font-medium">Мед</td>
                                    <td class="text-center">360</td>
                                    <td class="text-center">280</td>
                                    <td class="text-center">35</td>
                                    <td class="text-center">12</td>
                                </tr>
                                <tr class="hover:bg-pink-50 transition-colors">
                                    <td class="py-3 px-2 font-medium">Варенье</td>
                                    <td class="text-center">320</td>
                                    <td class="text-center">260</td>
                                    <td class="text-center">30</td>
                                    <td class="text-center">10</td>
                                </tr>
                                <tr class="hover:bg-pink-50 transition-colors">
                                    <td class="py-3 px-2 font-medium">Сгущенка</td>
                                    <td class="text-center">300</td>
                                    <td class="text-center">240</td>
                                    <td class="text-center">30</td>
                                    <td class="text-center">10</td>
                                </tr>
                                <tr class="hover:bg-pink-50 transition-colors">
                                    <td class="py-3 px-2 font-medium">Сироп</td>
                                    <td class="text-center">320</td>
                                    <td class="text-center">260</td>
                                    <td class="text-center">25</td>
                                    <td class="text-center">8</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Таблица 5: Жидкости - ИЗМЕНЕН ЗНАЧОК -->
                <div class="category-table bg-white rounded-3xl shadow-2xl overflow-hidden transform hover:scale-[1.02] transition-all duration-500" data-category="liquids">
                    <div class="bg-gradient-to-r from-cyan-400 to-cyan-500 px-6 py-4">
                        <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                            <span class="text-3xl">💦</span> <!-- Вместо 💧 -->
                            Жидкости
                            <span class="text-sm bg-white bg-opacity-20 px-3 py-1 rounded-full ml-auto">⚖️ мл</span>
                        </h2>
                    </div>
                    <div class="p-6">
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                <tr class="border-b-2 border-cyan-200">
                                    <th class="text-left py-3 px-2 text-cyan-800 font-bold">Продукт</th>
                                    <th class="text-center py-3 px-2 text-cyan-800 font-bold">Стакан 250мл</th>
                                    <th class="text-center py-3 px-2 text-cyan-800 font-bold">Стакан 200мл</th>
                                    <th class="text-center py-3 px-2 text-cyan-800 font-bold">Ст. ложка</th>
                                    <th class="text-center py-3 px-2 text-cyan-800 font-bold">Ч. ложка</th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-cyan-100">
                                <tr class="hover:bg-cyan-50 transition-colors">
                                    <td class="py-3 px-2 font-medium">Вода</td>
                                    <td class="text-center">250</td>
                                    <td class="text-center">200</td>
                                    <td class="text-center">18</td>
                                    <td class="text-center">5</td>
                                </tr>
                                <tr class="hover:bg-cyan-50 transition-colors">
                                    <td class="py-3 px-2 font-medium">Уксус</td>
                                    <td class="text-center">250</td>
                                    <td class="text-center">200</td>
                                    <td class="text-center">15</td>
                                    <td class="text-center">5</td>
                                </tr>
                                <tr class="hover:bg-cyan-50 transition-colors">
                                    <td class="py-3 px-2 font-medium">Соевый соус</td>
                                    <td class="text-center">250</td>
                                    <td class="text-center">200</td>
                                    <td class="text-center">18</td>
                                    <td class="text-center">5</td>
                                </tr>
                                <tr class="hover:bg-cyan-50 transition-colors">
                                    <td class="py-3 px-2 font-medium">Вино</td>
                                    <td class="text-center">250</td>
                                    <td class="text-center">200</td>
                                    <td class="text-center">18</td>
                                    <td class="text-center">5</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Таблица 6: Фрукты и ягоды - ИЗМЕНЕН ЗНАЧОК -->
                <div class="category-table bg-white rounded-3xl shadow-2xl overflow-hidden transform hover:scale-[1.02] transition-all duration-500" data-category="fruits">
                    <div class="bg-gradient-to-r from-red-400 to-red-500 px-6 py-4">
                        <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                            <span class="text-3xl">🍒</span> <!-- Вместо 🍎 -->
                            Фрукты и ягоды
                            <span class="text-sm bg-white bg-opacity-20 px-3 py-1 rounded-full ml-auto">⚖️ 1 шт/стакан</span>
                        </h2>
                    </div>
                    <div class="p-6">
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                <tr class="border-b-2 border-red-200">
                                    <th class="text-left py-3 px-2 text-red-800 font-bold">Продукт</th>
                                    <th class="text-center py-3 px-2 text-red-800 font-bold">Вес 1 шт (г)</th>
                                    <th class="text-center py-3 px-2 text-red-800 font-bold">Стакан 250мл</th>
                                    <th class="text-center py-3 px-2 text-red-800 font-bold">Стакан 200мл</th>
                                    <th class="text-center py-3 px-2 text-red-800 font-bold">Ст. ложка</th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-red-100">
                                <tr class="hover:bg-red-50 transition-colors">
                                    <td class="py-3 px-2 font-medium">Яблоко</td>
                                    <td class="text-center">150-200</td>
                                    <td class="text-center">-</td>
                                    <td class="text-center">-</td>
                                    <td class="text-center">-</td>
                                </tr>
                                <tr class="hover:bg-red-50 transition-colors">
                                    <td class="py-3 px-2 font-medium">Банан</td>
                                    <td class="text-center">120-150</td>
                                    <td class="text-center">-</td>
                                    <td class="text-center">-</td>
                                    <td class="text-center">-</td>
                                </tr>
                                <tr class="hover:bg-red-50 transition-colors">
                                    <td class="py-3 px-2 font-medium">Апельсин</td>
                                    <td class="text-center">150-200</td>
                                    <td class="text-center">-</td>
                                    <td class="text-center">-</td>
                                    <td class="text-center">-</td>
                                </tr>
                                <tr class="hover:bg-red-50 transition-colors">
                                    <td class="py-3 px-2 font-medium">Клубника</td>
                                    <td class="text-center">10-15</td>
                                    <td class="text-center">150</td>
                                    <td class="text-center">120</td>
                                    <td class="text-center">25</td>
                                </tr>
                                <tr class="hover:bg-red-50 transition-colors">
                                    <td class="py-3 px-2 font-medium">Малина</td>
                                    <td class="text-center">2-3</td>
                                    <td class="text-center">140</td>
                                    <td class="text-center">110</td>
                                    <td class="text-center">20</td>
                                </tr>
                                <tr class="hover:bg-red-50 transition-colors">
                                    <td class="py-3 px-2 font-medium">Смородина</td>
                                    <td class="text-center">1-2</td>
                                    <td class="text-center">150</td>
                                    <td class="text-center">120</td>
                                    <td class="text-center">25</td>
                                </tr>
                                <tr class="hover:bg-red-50 transition-colors">
                                    <td class="py-3 px-2 font-medium">Виноград</td>
                                    <td class="text-center">5-8</td>
                                    <td class="text-center">160</td>
                                    <td class="text-center">130</td>
                                    <td class="text-center">25</td>
                                </tr>
                                <tr class="hover:bg-red-50 transition-colors">
                                    <td class="py-3 px-2 font-medium">Вишня</td>
                                    <td class="text-center">3-5</td>
                                    <td class="text-center">140</td>
                                    <td class="text-center">110</td>
                                    <td class="text-center">20</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Дополнительная информация: Ложки и стаканы - ИЗМЕНЕНЫ ЗНАЧКИ -->
            <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-2xl shadow-xl p-6 transform hover:scale-105 transition-all duration-500">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                            <span class="text-2xl">🥄</span>
                        </div>
                        <h3 class="text-xl font-bold text-green-800">Стандартные ложки</h3>
                    </div>
                    <div class="space-y-2 text-gray-700">
                        <p class="flex justify-between"><span>1 столовая ложка:</span> <span class="font-bold">18-20 мл</span></p>
                        <p class="flex justify-between"><span>1 чайная ложка:</span> <span class="font-bold">5 мл</span></p>
                        <p class="flex justify-between"><span>1 десертная ложка:</span> <span class="font-bold">10 мл</span></p>
                        <p class="text-sm text-gray-500 mt-2">* Объем продуктов зависит от плотности</p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-xl p-6 transform hover:scale-105 transition-all duration-500">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                            <span class="text-2xl">🥛</span>
                        </div>
                        <h3 class="text-xl font-bold text-green-800">Стандартные стаканы</h3>
                    </div>
                    <div class="space-y-2 text-gray-700">
                        <p class="flex justify-between"><span>Граненый стакан:</span> <span class="font-bold">200 мл</span></p>
                        <p class="flex justify-between"><span>Тонкий стакан:</span> <span class="font-bold">250 мл</span></p>
                        <p class="flex justify-between"><span>Мерный стакан:</span> <span class="font-bold">до 500 мл</span></p>
                        <p class="text-sm text-gray-500 mt-2">* До краев (полный)</p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-xl p-6 transform hover:scale-105 transition-all duration-500">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                            <span class="text-2xl">💡</span> <!-- Вместо ⚖️ -->
                        </div>
                        <h3 class="text-xl font-bold text-green-800">Полезные советы</h3>
                    </div>
                    <div class="space-y-2 text-gray-700">
                        <p class="flex gap-2"><span class="text-green-600">•</span> Муку не утрамбовывать</p>
                        <p class="flex gap-2"><span class="text-green-600">•</span> Сахар с горкой - больше на 5-10г</p>
                        <p class="flex gap-2"><span class="text-green-600">•</span> Жидкости наливать до краев</p>
                        <p class="flex gap-2"><span class="text-green-600">•</span> Мед лучше взвешивать</p>
                    </div>
                </div>
            </div>

            <!-- Поиск по таблицам -->
            <div class="mt-8 bg-white rounded-2xl shadow-xl p-6">
                <div class="flex flex-col md:flex-row items-center gap-4">
                    <div class="flex-1 w-full">
                        <div class="relative">
                            <input type="text" id="searchInput" placeholder="🔍 Поиск продукта (например: мука, сахар, молоко...)"
                                   class="w-full px-6 py-4 border-2 border-green-200 rounded-full focus:border-green-500 focus:outline-none focus:ring-4 focus:ring-green-100 transition-all">
                        </div>
                    </div>
                    <button id="searchBtn" class="bg-gradient-to-r from-green-500 to-green-600 text-white px-8 py-4 rounded-full font-bold shadow-md hover:shadow-xl transform hover:scale-105 transition-all duration-300 flex items-center gap-2">
                        <span>🔍</span> Найти
                    </button>
                    <button id="resetBtn" class="bg-gray-100 text-gray-700 px-6 py-4 rounded-full font-bold shadow-md hover:shadow-xl transform hover:scale-105 transition-all duration-300 flex items-center gap-2">
                        <span>🔄</span> Сброс
                    </button>
                </div>
                <div id="searchResults" class="mt-4 hidden">
                    <div class="bg-green-50 rounded-2xl p-4">
                        <p class="text-green-800 font-semibold" id="resultsCount">Найдено: 0</p>
                        <div id="resultsList" class="mt-2 space-y-2 max-h-60 overflow-y-auto"></div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            (function() {
                "use strict";

                // Фильтрация по категориям
                const categoryBtns = document.querySelectorAll('.category-btn');
                const categoryTables = document.querySelectorAll('.category-table');

                function filterTables(category) {
                    categoryTables.forEach(table => {
                        const tableCategory = table.dataset.category;
                        if (category === 'all' || tableCategory === category) {
                            table.style.display = 'block';
                        } else {
                            table.style.display = 'none';
                        }
                    });
                }

                categoryBtns.forEach(btn => {
                    btn.addEventListener('click', function() {
                        // Убираем active у всех кнопок
                        categoryBtns.forEach(b => {
                            b.classList.remove('active', 'bg-green-600', 'text-white');
                            b.classList.add('bg-white', 'text-green-700');
                        });

                        // Добавляем active текущей кнопке
                        this.classList.add('active', 'bg-green-600', 'text-white');
                        this.classList.remove('bg-white', 'text-green-700');

                        const category = this.dataset.category;
                        filterTables(category);
                    });
                });

                // Поиск по таблицам
                const searchInput = document.getElementById('searchInput');
                const searchBtn = document.getElementById('searchBtn');
                const resetBtn = document.getElementById('resetBtn');
                const searchResults = document.getElementById('searchResults');
                const resultsCount = document.getElementById('resultsCount');
                const resultsList = document.getElementById('resultsList');

                // Собираем все данные из таблиц
                function collectAllData() {
                    const data = [];
                    const tables = document.querySelectorAll('.category-table');

                    tables.forEach(table => {
                        const categoryTitle = table.querySelector('h2 span:last-child')?.textContent || '';
                        const rows = table.querySelectorAll('tbody tr');

                        rows.forEach(row => {
                            const product = row.cells[0]?.textContent || '';
                            const values = Array.from(row.cells).slice(1).map(cell => cell.textContent);

                            if (product && product !== '') {
                                data.push({
                                    product: product,
                                    category: categoryTitle,
                                    values: values,
                                    table: table
                                });
                            }
                        });
                    });

                    return data;
                }

                function searchProducts(query) {
                    if (!query || query.length < 2) {
                        searchResults.classList.add('hidden');
                        return;
                    }

                    const allData = collectAllData();
                    const queryLower = query.toLowerCase();

                    const results = allData.filter(item =>
                        item.product.toLowerCase().includes(queryLower)
                    );

                    if (results.length > 0) {
                        resultsCount.textContent = `Найдено: ${results.length}`;
                        resultsList.innerHTML = '';

                        results.forEach(item => {
                            const resultItem = document.createElement('div');
                            resultItem.className = 'bg-white rounded-xl p-3 shadow-sm hover:shadow-md transition-all cursor-pointer';
                            resultItem.innerHTML = `
                            <div class="flex justify-between items-center">
                                <div>
                                    <span class="font-bold text-green-800">${item.product}</span>
                                    <span class="text-sm text-gray-500 ml-2">${item.category}</span>
                                </div>
                                <div class="text-sm text-gray-600">
                                    ${item.values.map((val, idx) => {
                                const labels = ['250мл', '200мл', 'ст.л', 'ч.л'];
                                return val !== '-' ? `<span class="ml-2">${labels[idx]}: ${val}</span>` : '';
                            }).join('')}
                                </div>
                            </div>
                        `;

                            resultItem.addEventListener('click', function() {
                                // Показываем таблицу с этим продуктом
                                filterTables(item.table.dataset.category);
                                // Скроллим к таблице
                                item.table.scrollIntoView({ behavior: 'smooth', block: 'center' });
                            });

                            resultsList.appendChild(resultItem);
                        });

                        searchResults.classList.remove('hidden');
                    } else {
                        resultsCount.textContent = `Найдено: 0`;
                        resultsList.innerHTML = '<p class="text-gray-500 p-3">Ничего не найдено</p>';
                        searchResults.classList.remove('hidden');
                    }
                }

                searchBtn.addEventListener('click', function() {
                    searchProducts(searchInput.value);
                });

                searchInput.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter') {
                        searchProducts(searchInput.value);
                    }
                });

                resetBtn.addEventListener('click', function() {
                    searchInput.value = '';
                    searchResults.classList.add('hidden');
                    filterTables('all');

                    // Возвращаем активность на "Все продукты"
                    categoryBtns.forEach(b => {
                        b.classList.remove('active', 'bg-green-600', 'text-white');
                        b.classList.add('bg-white', 'text-green-700');
                    });
                    document.querySelector('[data-category="all"]').classList.add('active', 'bg-green-600', 'text-white');
                });

                // Показать все таблицы при загрузке
                filterTables('all');
            })();
        </script>
    </div>

@endsection
