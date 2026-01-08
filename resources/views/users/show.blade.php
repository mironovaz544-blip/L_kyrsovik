@extends('layouts.app')

@section('title', 'Пользователи')

@section('content')

<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-green-600">Пользователь #{{ $user->id }}</h1>
        <div class="flex gap-2">
            <a href="{{ route('users.edit', $user) }}" class="bg-gradient-to-r from-amber-400 to-red-500 hover:from-red-600 hover:to-amber-500 text-white font-medium py-2 px-4 rounded">
                Изменить
            </a>
            <a href="{{ route('users.index') }}" class="bg-gradient-to-r from-lime-400 to-green-500 hover:from-green-700 hover:to-lime-500 text-white font-medium py-2 px-4 rounded">
                Назад
            </a>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6 space-y-4">
        <div class="flex justify-between">
            <span class="font-medium text-green-700">Имя:</span>
            <span class="text-gray-800">{{ $user->name }}</span>
        </div>
        <div class="flex justify-between">
            <span class="font-medium text-green-700">Фамилия:</span>
            <span class="text-gray-800">{{ $user->surname }}</span>
        </div>
        <div class="flex justify-between">
            <span class="font-medium text-green-700">Отчество:</span>
            <span class="text-gray-800">{{ $user->patronymic }}</span>
        </div>
        <div class="flex justify-between">
            <span class="font-medium text-green-700">Роль:</span>
            <span class="text-gray-800">{{ $user->role->label() }}</span>
        </div>
        <div class="flex justify-between">
            <span class="font-medium text-green-700">Эл.почта:</span>
            <span class="text-gray-800">{{ $user->email }}</span>
        </div>
        <div class="flex justify-between">
            <span class="font-medium text-green-700">Аккаунт создан:</span>
            <span class="text-gray-800">{{ $user->created_at }}</span>
        </div>
    </div>
</div>

@endsection
