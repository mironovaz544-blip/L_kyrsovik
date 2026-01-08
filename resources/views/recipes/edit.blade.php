@extends('layouts.app')

@section('title', 'Рецепты')
@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-green-500">
            Обновление данных по рецепту #{{ $recipe->id }}
        </h1>
        <a href="{{ route('recipes.index') }}" class="bg-gradient-to-r from-lime-400 to-green-500 hover:from-green-700 hover:to-lime-500 text-white font-medium py-2 px-4 rounded">
            Назад
        </a>
    </div>

    @include('components.form_errors')

    <div class="bg-white shadow-md rounded-lg p-6">
        <form action="{{ route('recipes.update', $recipe) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PATCH')
            @include('recipes.form')
        </form>
    </div>
</div>
@endsection
