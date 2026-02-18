@extends('layouts.app')

@section('title', 'Статьи')
@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-semibold text-green-500">Создание новой статьи</h1>
            <a href="{{ route('articles.index') }}" class="bg-gradient-to-r from-lime-400 to-green-500 hover:from-green-700 hover:to-lime-500 text-white font-medium py-2 px-4 rounded">
                Назад
            </a>
        </div>

        @include('components.form_errors')
        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @include('articles.form')
            </form>
        </div>
    </div>
@endsection
