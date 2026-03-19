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

                <!-- Добавить рецепт+ - проверка авторизации -->
                @auth
                    <a href="{{ route('shop.create-advice') }}"
                       class="text-green-700 hover:text-green-900 px-3 py-2 rounded-md text-xl font-medium
                              transition-all duration-300 hover:bg-green-200 hover:bg-opacity-50
                              relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5
                              after:bg-green-500 after:transition-all after:duration-300 hover:after:w-full">
                        Добавить рецепт+
                    </a>
                @else
                    <button onclick="openModal('loginModal')"
                            class="text-green-700 hover:text-green-900 px-3 py-2 rounded-md text-xl font-medium
                                   transition-all duration-300 hover:bg-green-200 hover:bg-opacity-50
                                   relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5
                                   after:bg-green-500 after:transition-all after:duration-300 hover:after:w-full">
                        Добавить рецепт+
                    </button>
                @endauth

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
                                <button onclick="openModal('loginModal')"
                                        class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-green-50 transition-all duration-300">
                                    Войти
                                </button>
                                <button onclick="openModal('registerModal')"
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

<!-- Модальные окна -->
<div id="loginModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" onclick="closeModal('loginModal')"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4" id="modal-title">
                            Вход в аккаунт
                        </h3>
                        <form method="POST" action="{{ route('login') }}" class="space-y-4">
                            @csrf
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="email" required
                                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                            </div>
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700">Пароль</label>
                                <input type="password" name="password" id="password" required
                                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" name="remember" id="remember" class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                                <label for="remember" class="ml-2 block text-sm text-gray-900">
                                    Запомнить меня
                                </label>
                            </div>
                            <div class="flex gap-3">
                                <button type="submit"
                                        class="flex-1 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-medium py-2 px-4 rounded-md shadow-sm transition duration-300">
                                    Войти
                                </button>
                                <button type="button" onclick="closeModal('loginModal')"
                                        class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded-md transition duration-300">
                                    Отмена
                                </button>
                            </div>
                            <div class="text-center mt-4">
                                <span class="text-sm text-gray-600">Нет аккаунта?</span>
                                <button type="button" onclick="switchToRegister()" class="text-sm text-green-600 hover:text-green-800 font-medium ml-1">
                                    Зарегистрироваться
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="registerModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" onclick="closeModal('registerModal')"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">
                            Регистрация
                        </h3>
                        <form method="POST" action="{{ route('register') }}" class="space-y-4">
                            @csrf
                            <div>
                                <label for="reg_name" class="block text-sm font-medium text-gray-700">Имя</label>
                                <input type="text" name="name" id="reg_name" required
                                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                            </div>
                            <div>
                                <label for="reg_email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="reg_email" required
                                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                            </div>
                            <div>
                                <label for="reg_password" class="block text-sm font-medium text-gray-700">Пароль</label>
                                <input type="password" name="password" id="reg_password" required
                                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                            </div>
                            <div>
                                <label for="reg_password_confirmation" class="block text-sm font-medium text-gray-700">Подтвердите пароль</label>
                                <input type="password" name="password_confirmation" id="reg_password_confirmation" required
                                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                            </div>
                            <div class="flex gap-3">
                                <button type="submit"
                                        class="flex-1 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-medium py-2 px-4 rounded-md shadow-sm transition duration-300">
                                    Зарегистрироваться
                                </button>
                                <button type="button" onclick="closeModal('registerModal')"
                                        class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded-md transition duration-300">
                                    Отмена
                                </button>
                            </div>
                            <div class="text-center mt-4">
                                <span class="text-sm text-gray-600">Уже есть аккаунт?</span>
                                <button type="button" onclick="switchToLogin()" class="text-sm text-green-600 hover:text-green-800 font-medium ml-1">
                                    Войти
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript для управления модальными окнами -->
<script>
    function openModal(modalId) {
        document.getElementById(modalId).classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    function switchToRegister() {
        closeModal('loginModal');
        openModal('registerModal');
    }

    function switchToLogin() {
        closeModal('registerModal');
        openModal('loginModal');
    }

    // Закрытие по Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal('loginModal');
            closeModal('registerModal');
        }
    });
</script>
