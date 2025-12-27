@php
    $recipe = $recipe ?? null;
@endphp

<div class="space-y-4">

    <div>
        <label for="role" class="block text-xl font-medium text-green-600">Выберите роль:</label>
        <select name="role" id="role" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm">
            @foreach($roles as $key => $value)
                <option value="{{ $key }}" @selected(old('role') == $key)>{{ $value }}</option>
            @endforeach
        </select>
        @error('role')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="title" class="block text-xl font-medium text-green-600">Название рецепта</label>
        <input value="{{ old('title', $recipe?->title) }}" type="text" id="title" name="title" required
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm">
        @error('title')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="image" class="block text-xl font-medium text-green-600">Фото</label>
        <input value="{{ old('image', $recipe?->image) }}" type="text" id="title" name="title" required
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm">
        @error('image')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="description" class="block text-xl font-medium text-green-600">Описание</label>
        <input value="{{ old('description', $recipe?->description) }}" type="text" id="description" name="description" required
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm">
        @error('description')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="count" class="block text-xl font-medium text-green-600">Состав продуктов</label>
        <input value="{{ old('count', $recipe?->count) }}" type="text" id="title" name="title" required
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm">
        @error('count')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="process" class="block text-xl font-medium text-green-600">Процесс приготовления</label>
        <input value="{{ old('process', $recipe?->process) }}" type="text" id="price" name="price" required
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm">
        @error('process')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="type" class="block text-xl font-medium text-green-600">Тип</label>
        <input value="{{ old('type', $recipe?->type) }}" type="text" id="type" name="type" required
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm">
        @error('type')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <button type="submit"
                class="bg-gradient-to-r from-lime-400 to-green-500 hover:from-green-700 hover:to-lime-500 text-white font-medium py-2 px-4 rounded">
            Сохранить данные
        </button>
    </div>


</div>

