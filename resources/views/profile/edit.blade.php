@extends('Layouts.shop')
@section("title", "Профиль Литвинушка")
@section('content')

    <div class="bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            @if(session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg flex items-center justify-between">
                    <div class="flex items-center">
                        <svg class="h-5 w-5 text-green-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <h1 class="text-3xl font-bold text-green-500 mb-8"> Настройки профиля </h1>
            <div class="space-y-6">
                <div class="bg-white border border-gray-200 rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-green-500 mb-4"> Информация профиля</h2>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-lg font-medium text-green-600">Имя</label>
                            <p class="mt-1 text-gray-900">{{ $user->name }}</p>
                        </div>
                        <div>
                            <label class="block text-lg font-medium text-green-600">Фамилия</label>
                            <p class="mt-1 text-gray-900">{{ $user->surname }}</p>
                        </div>
                        <div>
                            <label class="block text-lg font-medium text-green-600"> Отчество</label>
                            <p class="mt-1 text-gray-900">{{ $user->patronymic }}</p>
                        </div>
                    </div>

                </div>

                <div class="bg-white border border-gray-200 rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-green-500 mb-4"> Изменить Email</h2>
                    <form method="POST" action="{{ route('profile.email.update') }}" class="space-y-4">
                        @csrf
                        @method("PATCH")

                        <x-form_errors />

                        <div>
                            <label for="email" class="block text-lg font-medium text-green-600 mb-2">Текущий Email</label>
                            <p class="text-gray-600 mb-4">{{ $user->email }}</p>

                            <label for="email" class="block text-lg font-medium text-green-600 mb-2">Новый Email</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                   placeholder=" Введите новый email">
                        </div>

                        <div>
                            <button type="submit" class="bg-gradient-to-r from-lime-400 to-green-500 hover:from-green-700 hover:to-lime-500 text-white font-semibold py-2 px-6 rounded-lg transition duration-150 ease-in-out">
                                Обновить Email
                            </button>
                        </div>
                    </form>
                </div>

                <div class="bg-white border border-gray-200 rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-green-500 mb-4"> Изменить пароль</h2>
                    <form method="POST" action="{{ route('profile.password.update') }}" class="space-y-4">
                        @csrf
                        @method("PATCH")

                        <x-form_errors />

                        <div>
                            <label for="current_password" class="block text-lg font-medium text-green-600 mb-2">Текущий пароль</label>
                            <input id="current_password" type="password" name="current_password" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                   placeholder="Введите текущий пароль">
                        </div>
                        <div>
                            <label for="password" class="block text-lg font-medium text-green-600 mb-2"> Новый пароль</label>
                            <input id="password" type="password" name="password" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus: ring-green-500 focus:border-green-500"
                                   placeholder="Введите новый пароль">
                        </div>
                        <div>
                            <label for="password_confirmation" class="block text-lg font-medium text-green-600 mb-2">Повторите новый пароль</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                   placeholder="Повторите новый пароль">
                        </div>
                        <div>
                            <button type="submit" class="bg-gradient-to-r from-lime-400 to-green-500 hover:from-green-700 hover:to-lime-500 text-white font-semibold py-2 px-6 rounded-lg transition duration-150 ease-in-out">
                                Обновить пароль
                            </button>
                        </div>
                    </form>
                </div>
                <div class="flex justify-center pt-4">
                    <a href="{{ route('shop.index') }}" class="text-green-600 hover:text-green-800 font-medium">
                        Вернуться в магазин
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
