@extends('layouts.app')

@section('title', 'Обновление данных пользователя #'.$user->id)

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-green-500">
                Обновление данных пользователя #{{ $user->id }}
            </h1>
            <a href="{{ route('users.index') }}" class="bg-gradient-to-r from-lime-400 to-green-500 hover:from-green-700 hover:to-lime-500 text-white font-medium py-2 px-4 rounded">
                Назад
            </a>
        </div>

        @include('components.form_errors')

        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('users.update', $user) }}" method="POST" class="space-y-4">
                @csrf
                @method('PATCH')
                @include('users.form')
            </form>
        </div>
    </div>
@endsection


