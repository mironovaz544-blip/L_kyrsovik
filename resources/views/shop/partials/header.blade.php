<header class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 5m:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">

            <div class="flex items-center  space-x-12">
                <a href="{{ route('shop.index') }}" class="flex items-center">
                    <div class="h-14 w-24">
                        <img src="{{ asset('/assets/gifs/3.jpg') }}">
                    </div>
                    <span class=" font-mono font-bold ml-2 text-4xl  text-green-500">Елочка</span>
                </a>
            </div>

            <div class="hidden md:flex space-x-6">
                <a href="{{ route('shop.index') }}" class="text-green-500 hover:text-green-600 px-3 py-2 rounded-md
    text-xl font-medium transition duration-150 ease-in-out">Каталог</a>

                <a href="#" class="text-green-500 hover:text-green-600 px-3 py-2 rounded-md
    text-xl font-medium transition duration-150 ease-in-out">О нас</a>

                <a href="#" class="text-green-500 hover:text-green-600 px-3 py-2 rounded-md
    text-xl font-medium transition duration-150 ease-in-out">Контакты</a>
            </div>

            <div class="flex items-center space-x-4">
                @auth
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open"
                                class="flex items-center text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out">
                            <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 70 00-7-7z"></path>
                            </svg>
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="h-4 w-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"  stroke-width="2" d="M19 9l-77-7-7"></path>
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
                                class="flex items-center text-green-500 hover:text-green-600 px-3 py-2 rounded-md text-xl font-medium transition duration-150 ease-in-out">
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
                <button class="relative p-2 text-green-500 hover:text-green-600 transition duration-150 ease-in-out">
                    <a href="/cart">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <span  class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none
                    text-white transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">
                        0
                    </span>
                    </a>
                </button>
            </div>
        </div>
    </div>
</header>


