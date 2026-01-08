<div id="loginModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-semibold text-green-600">Вход в аккаунт</h3>
            <button onclick="closeModal('loginModal')" class="text-gray-400 hover:text-gray-600">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <x-auth-session-status class="mb-4" :status="session('status')"/>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <x-form_errors />
            <div>
                <label for="login-email" class="block text-lg font-medium text-green-600">Е-майл</label>
                <input id="login-email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                       type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"/>
            </div>
            <div class="mt-4">
                <label for="login-password" class="block text-lg font-medium text-green-600">Пароль</label>
                <input id="login-password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                       type="password" name="password" required autocomplete="current-password"/>
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-lg text-gray-600">Запомнить меня</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-4">
                @if (Route::has('password.request'))
                    <a class="text-lg text-green-600 hover:text-green-800" href="{{ route('password.request') }}">
                        Забыли пароль?
                    </a>
                @endif

                <button type="submit" class="bg-gradient-to-r from-lime-400 to-green-500 hover:from-green-700 hover:to-lime-500 text-white font-semibold py-2 px-4 rounded-lg transition duration-150 ease-in-out">
                    Войти
                </button>
            </div>

            <div class="mt-4 text-center">
                <span class="text-lg text-gray-600">Нет аккаунта?</span>
                <button type="button" onclick="switchModal('loginModal', 'registerModal')" class="text-lg text-green-600 hover:text-green-800 font-semibold">
                    Зарегистрироваться
                </button>
            </div>
        </form>
    </div>
</div>

<div id="registerModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-semibold text-green-600">Регистрация</h3>
            <button onclick="closeModal('registerModal')" class="text-gray-400 hover:text-gray-600">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"  stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <x-form_errors />

            <div class="mt-4">
                <label for="name" class="block text-lg font-medium text-green-600">Имя</label>
                <input id="name"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                       type="text" name="name" value="{{ old('name') }}" required autocomplete="name"/>
            </div>

            <div>
                <label for="surname" class="block text-lg font-medium text-green-600">Фамилия</label>
                <input id="surname"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                       type="text" name="surname" value="{{ old('surname') }}" required autofocus autocomplete="surname" />
            </div>

            <div class="mt-4">
                <label for="patronymic" class="block text-lg font-medium text-green-600">Отчество</label>
                <input id="patronymic"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                       type="text" name="patronymic" value="{{ old('patronymic') }}" required autocomplete="patronymic"/>
            </div>

            <div class="mt-4">
                <label for="register-email" class="block text-lg font-medium text-green-600">Е-мейл</label>
                <input id="register-email"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                       type="email" name="email" value="{{ old('email') }}" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <label for="register-password" class="block text-lg font-medium text-green-600">Пароль</label>
                <input id="register-password"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                       type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <label for="password_confirmation" class="block text-lg font-medium text-green-600"> Подтвердите пароль</label>
                <input id="password_confirmation"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                       type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="bg-gradient-to-r from-lime-400 to-green-500 hover:from-green-700 hover:to-lime-500 text-white font-semibold py-2 px-4 rounded-lg transition duration-150 ease-in-out">
                    Зарегистрироваться
                </button>
            </div>

            <div class="mt-4 text-center">
                <span class="text-sm text-gray-600"> Уже есть аккаунт?</span>
                <button type="button" onclick="switchModal('registerModal', 'loginModal')" class="text-sm text-green-500 hover: text-green-700 font-semibold">
                    Войти
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal(modalId) {
        document.getElementById(modalId).classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    function switchModal(currentModalId, targetModalId) {
        closeModal(currentModalId);
        openModal(targetModalId);
    }

    window.onclick = function (event) {
        if(event.target.id === 'loginModal' || event.target.id === 'reqisterModal') {
            closeModal(event.target.id);
        }
    }

    document.addEventListener('keydown', function (event) {
        if(event.key === 'Escape') {
            closeModal('loginModal');
            closeModal('registerModal')
        }
    });
</script>

@if ($errors->any())
    <script>
        const registerFields = ['surname','name','patronymic','password_confirmation'];
        let isRegisterError = false;
        @foreach ($errors->keys() as $field)
        if(registerFields.includes('{{ $field }}')) {
            isRegisterError = true;
        }
        @endforeach

        if(isRegisterError) {
            openModal('registerModal');
        } @else {
            openModal('loginModal');
        }
    </script>
@endif

