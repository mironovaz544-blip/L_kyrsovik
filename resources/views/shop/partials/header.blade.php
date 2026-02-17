<header class="bg-green-100 shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 5m:px-6 lg:px-8">
        <div class="flex justify-between items-center h-24">

            <div class="flex items-center  space-x-12">
                <a href="{{ route('shop.index') }}" class="flex items-center">
                    <div class="h-full w-16">
                        <img src="{{ asset('/assets/gifs/Recipe-575434.svg.png') }}">
                    </div>
                    <span class="  font-bold ml-2 text-4xl  text-green-500 hover:text-green-800">Вкусняшка</span>
                </a>
            </div>

            <div class="hidden md:flex space-x-6">
                <a href="/recept"
                   class="text-green-500 hover:text-green-800  px-3 py-2 rounded-md
    text-xl font-medium transition duration-150 ease-in-out">Рецепты</a>

                <a href="{{ route('shop.article') }}"  class="text-green-500 hover:text-green-800 px-3 py-2 rounded-md
    text-xl font-medium transition duration-150 ease-in-out">Статьи</a>

                <a href="/calculators" class="text-green-500 hover:text-green-800 px-3 py-2 rounded-md
    text-xl font-medium transition duration-150 ease-in-out">Таблицы мер и весов</a>



            <div class="flex items-center space-x-4">
                @auth
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open"
                                class="flex items-center text-green-500 hover:text-green-800 px-3 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out">
                            <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="h-4 w-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"  stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Профиль
                            </a>
                            <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Панель управления
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Выйти
                                </button>
                            </form>
                        </div>
                    </div>
                @else

                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open"
                                class="flex items-center text-green-500 hover:text-green-800 px-3 py-2 rounded-md text-xl font-medium transition duration-150 ease-in-out">
                            <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span> Аккаунт</span>
                            <svg class="h-4 w-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                            <button @click="openModal('loginModal'); open = false" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Войти
                            </button>
                            <button @click="openModal('registerModal'); open = false" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Регистрация
                            </button>
                        </div>
                    </div>

                @endauth
            </div>
            </div>
        </div>
    </div>
</header>


