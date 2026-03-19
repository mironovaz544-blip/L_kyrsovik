@extends('layouts.app')

@section('title', 'Редактирование рецепта')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-green-600">Редактирование рецепта #{{ $advice->id }}</h1>
            <div class="flex gap-2">
                <a href="{{ route('advices.show', $advice) }}" class="bg-gradient-to-r from-lime-400 to-green-500 hover:from-green-700 hover:to-lime-500 text-white font-medium py-2 px-4 rounded">
                    Просмотр
                </a>
                <a href="{{ route('advices.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium py-2 px-4 rounded">
                    Назад
                </a>
            </div>
        </div>

        @include('components.form_errors')

        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('advices.update', $advice) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')
                @include('advices.form')
            </form>
        </div>
    </div>
@endsection
