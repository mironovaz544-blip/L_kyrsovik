<header class="bg-gradient-to-r from-green-100 via-green-200 to-emerald-100 shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-24">

            <!-- Логотип с нежным градиентом -->
            <div class="flex items-center space-x-12">
                <a href="{{ route('shop.index') }}" class="flex items-center group">
                    <div class="h-full w-16 transform group-hover:scale-105 transition-transform duration-300">
                        <img src="{{ asset('/assets/gifs/Recipe-575434.svg.png') }}" class="drop-shadow-sm">
                    </div>
                    <span class="font-bold ml-2 text-4xl bg-gradient-to-r from-green-600 to-emerald-600 bg-clip-text text-transparent hover:from-green-500 hover:to-emerald-500 transition-all duration-300">
                        Вкусняшка
                    </span>
                </a>
            </div>

            <!-- Навигация с нежными эффектами -->
            <div class="hidden md:flex space-x-6">
                <a href="/recept"
                   class="text-green-700 hover:text-green-900 px-3 py-2 rounded-md text-xl font-medium
                          transition-all duration-300 hover:bg-green-200 hover:bg-opacity-50
                          relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5
                          after:bg-green-500 after:transition-all after:duration-300 hover:after:w-full">
                    Рецепты
                </a>

                <a href="{{ route('shop.article') }}"
                   class="text-green-700 hover:text-green-900 px-3 py-2 rounded-md text-xl font-medium
                          transition-all duration-300 hover:bg-green-200 hover:bg-opacity-50
                          relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5
                          after:bg-green-500 after:transition-all after:duration-300 hover:after:w-full">
                    Статьи
                </a>

                <a href="/calculators"
                   class="text-green-700 hover:text-green-900 px-3 py-2 rounded-md text-xl font-medium
                          transition-all duration-300 hover:bg-green-200 hover:bg-opacity-50
                          relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5
                          after:bg-green-500 after:transition-all after:duration-300 hover:after:w-full">
                    Таблицы мер и весов
                </a>

                <!-- Аккаунт -->
                <div class="flex items-center space-x-4">
                    @auth
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open"
                                    class="flex items-center bg-white bg-opacity-70 text-green-700 px-4 py-2 rounded-lg
                                           text-sm font-medium transition-all duration-300 hover:bg-opacity-100
                                           hover:shadow-md border border-green-200">
                                <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span>{{ Auth::user()->name }}</span>
                                <svg class="h-4 w-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>

                            <div x-show="open" @click.away="open = false" x-transition
                                 class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-1 z-50 border border-green-100">
                                <a href="{{ route('profile.edit') }}"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 transition-all duration-300">
                                    Профиль
                                </a>
                                <a href="{{ route('dashboard') }}"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 transition-all duration-300">
                                    Панель управления
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                            class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-green-50 transition-all duration-300">
                                        Выйти
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open"
                                    class="flex items-center bg-white bg-opacity-70 text-green-700 px-4 py-2 rounded-lg
                                           text-xl font-medium transition-all duration-300 hover:bg-opacity-100
                                           hover:shadow-md border border-green-200">
                                <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span>Аккаунт</span>
                                <svg class="h-4 w-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>

                            <div x-show="open" @click.away="open = false" x-transition
                                 class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-1 z-50 border border-green-100">
                                <button @click="openModal('loginModal'); open = false"
                                        class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-green-50 transition-all duration-300">
                                    Войти
                                </button>
                                <button @click="openModal('registerModal'); open = false"
                                        class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-green-50 transition-all duration-300">
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
