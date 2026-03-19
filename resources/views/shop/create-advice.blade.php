@extends('layouts.shop')

@section('title', 'Добавить рецепт')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <!-- Заголовок -->
            <div class="text-center mb-10">
                <h1 class="text-4xl font-bold text-green-600 mb-4">Добавить новый рецепт</h1>
                <p class="text-xl text-gray-600">Поделитесь своим кулинарным шедевром с нашим сообществом</p>
            </div>

            <!-- Уведомления об ошибках -->
            @if($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-lg" role="alert">
                    <p class="font-bold mb-2">Пожалуйста, исправьте следующие ошибки:</p>
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Форма создания рецепта -->
            <div class="bg-white rounded-2xl shadow-xl p-8 border border-green-100">
                <form action="{{ route('shop.store-advice') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Название рецепта -->
                    <div>
                        <label for="title" class="block text-lg font-semibold text-green-700 mb-2">
                            Название рецепта <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               id="title"
                               name="title"
                               value="{{ old('title') }}"
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:ring focus:ring-green-200 transition @error('title') border-red-500 @enderror"
                               placeholder="Например: Классический борщ"
                               required>
                        @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Описание -->
                    <div>
                        <label for="description" class="block text-lg font-semibold text-green-700 mb-2">
                            Краткое описание <span class="text-red-500">*</span>
                        </label>
                        <textarea id="description"
                                  name="description"
                                  rows="2"
                                  class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:ring focus:ring-green-200 transition @error('description') border-red-500 @enderror"
                                  placeholder="Кратко опишите блюдо..."
                                  required>{{ old('description') }}</textarea>
                        @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Состав продуктов -->
                    <div>
                        <label for="counts" class="block text-lg font-semibold text-green-700 mb-2">
                            Состав продуктов <span class="text-red-500">*</span>
                        </label>
                        <textarea id="counts"
                                  name="counts"
                                  rows="3"
                                  class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:ring focus:ring-green-200 transition @error('counts') border-red-500 @enderror"
                                  placeholder="Перечислите все ингредиенты и их количество..."
                                  required>{{ old('counts') }}</textarea>
                        @error('counts')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Процесс приготовления -->
                    <div>
                        <label for="process" class="block text-lg font-semibold text-green-700 mb-2">
                            Процесс приготовления <span class="text-red-500">*</span>
                        </label>
                        <textarea id="process"
                                  name="process"
                                  rows="5"
                                  class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:ring focus:ring-green-200 transition @error('process') border-red-500 @enderror"
                                  placeholder="Опишите шаги приготовления..."
                                  required>{{ old('process') }}</textarea>
                        @error('process')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Тип рецепта (категория) -->
                    <div>
                        <label for="type" class="block text-lg font-semibold text-green-700 mb-2">
                            Категория <span class="text-red-500">*</span>
                        </label>
                        <select id="type"
                                name="type"
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:ring focus:ring-green-200 transition @error('type') border-red-500 @enderror"
                                required>
                            <option value="">-- Выберите категорию --</option>
                            @foreach($types as $value => $label)
                                <option value="{{ $value }}" {{ old('type') == $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                        @error('type')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Фото рецепта -->
                    <div>
                        <label for="photo" class="block text-lg font-semibold text-green-700 mb-2">
                            Фото готового блюда
                        </label>
                        <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-green-500 transition">
                            <input type="file"
                                   id="photo"
                                   name="photo"
                                   accept="image/jpeg,image/jpg,image/png,image/webp"
                                   class="hidden"
                                   onchange="previewImage(this)">
                            <button type="button"
                                    onclick="document.getElementById('photo').click()"
                                    class="bg-green-50 text-green-600 px-6 py-3 rounded-lg hover:bg-green-100 transition">
                                <svg class="w-6 h-6 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Выберите файл
                            </button>
                            <p class="text-sm text-gray-500 mt-2">JPEG, PNG, WebP, макс. 5MB</p>
                            <div id="image-preview" class="mt-4 hidden">
                                <img src="" alt="Preview" class="max-w-xs mx-auto rounded-lg shadow-md">
                            </div>
                        </div>
                        @error('photo')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Кнопки -->
                    <div class="flex gap-4 pt-4">
                        <button type="submit"
                                class="flex-1 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-bold py-3 px-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300 transform hover:scale-105">
                            Опубликовать рецепт
                        </button>
                        <a href="{{ route('shop.index') }}"
                           class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold py-3 px-6 rounded-xl shadow hover:shadow-lg transition duration-300 text-center">
                            Отмена
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewImage(input) {
            const preview = document.getElementById('image-preview');
            const previewImg = preview.querySelector('img');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    preview.classList.remove('hidden');
                }

                reader.readAsDataURL(input.files[0]);
            } else {
                preview.classList.add('hidden');
                previewImg.src = '';
            }
        }
    </script>
@endsection
