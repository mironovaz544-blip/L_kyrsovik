@extends('layouts.shop')

@section('title', 'Статьи - Вкусняшка')
@section('content')

    <div class="bg-green-100  flex">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

            <!-- Заголовок -->
            <h1 class="text-5xl font-bold mb-6 text-green-500">
                Листья смородины: польза и вред
            </h1>

            <!-- Изображение смородины -->
            <img src="{{ asset('/assets/gifs/смородина.jpg') }}" alt=""
                 class="w-1/2 h-auto rounded-xl mb-6 shadow-md">

            <!-- Раздел "Польза смородиновых листьев" -->
            <h2 class="text-3xl font-bold mb-4 text-green-500">
                Польза смородиновых листьев
            </h2>
            <p class="text-lg text-gray-700 mb-4">
                В смородиновых листьях много полезных веществ, которые помогают сохранить здоровье.
            </p>

            <!-- Выделение информации о витамине С -->
            <div class="bg-orange-200 p-4 rounded-lg mb-6 shadow-md">
                <p class="text-gray-800">
                    Витамин С, которого много в смородиновых листьях, укрепляет наш иммунитет, эффективно борется с инфекциями и вирусами.
                </p>
            </div>

            <!-- Список полезных свойств -->
            <ul class="list-disc pl-6 mb-6">
                <li class="text-lg text-gray-700 mb-2">
                    Фитонциды обладают антибактериальными и противовоспалительными свойствами.
                </li>
                <li class="text-lg text-gray-700 mb-2">
                    Витамин К ускоряет заживление ран и ожогов.
                </li>
                <li class="text-lg text-gray-700 mb-2">
                    Калий и магний поддерживают сердечную деятельность.
                </li>
                <li class="text-lg text-gray-700 mb-2">
                    Витамины группы В улучшают память и концентрацию.
                </li>
                <li class="text-lg text-gray-700 mb-2">
                    Хром помогает контролировать уровень сахара в крови.
                </li>
            </ul>

            <!-- Польза для кожи и волос -->
            <p class="text-lg text-gray-700 mb-4">
                Для кожи и волос: витамин А и антиоксиданты предотвращают появление морщин и укрепляют волосы.
            </p>

            <!-- Раздел "Вред смородиновых листьев" -->
            <h2 class="text-3xl font-bold mb-4 text-green-500">
                Вред смородиновых листьев
            </h2>
            <p class="text-lg text-gray-700 mb-4">
                Несмотря на пользу, листья смородины могут быть вредны для некоторых групп людей.
            </p>

            <!-- Список противопоказаний -->
            <ul class="list-disc pl-6 mb-6">
                <li class="text-lg text-gray-700 mb-2">
                    Аллергические реакции на растительные препараты.
                </li>
                <li class="text-lg text-gray-700 mb-2">
                    Тромбофлебит или повышенная свёртываемость крови.
                </li>
                <li class="text-lg text-gray-700 mb-2">
                    Хронические заболевания почек.
                </li>
                <li class="text-lg text-gray-700 mb-2">
                    Острая форма язвы, гастрита, повышенная кислотность желудка.
                </li>
                <li class="text-lg text-gray-700 mb-2">
                    Беременность (требуется осторожность).
                </li>
            </ul>

            <!-- Раздел "Когда и как собирать смородиновые листья" -->
            <h2 class="text-3xl font-bold mb-4 text-green-500">
                Когда и как собирать смородиновые листья
            </h2>
            <p class="text-lg text-gray-700 mb-4">
                Мнения о времени сбора листьев различаются. Оптимальное время — цветение куста.
            </p>

            <!-- Инструкции по сбору -->
            <div class="bg-orange-200 p-4 rounded-lg mb-6 shadow-md">
                <ul class="list-disc pl-6">
                    <li class="text-lg text-gray-700 mb-2">
                        Собирать в сухую погоду, утром (10–11 часов).
                    </li>
                    <li class="text-lg text-gray-700 mb-2">
                        Выбирать здоровые листья без сухих пятен и гнили.
                    </li>
                    <li class="text-lg text-gray-700 mb-2">
                        Оставлять не менее половины листьев на кусте.
                    </li>
                </ul>
            </div>
        </div>
    </div>





@endsection
