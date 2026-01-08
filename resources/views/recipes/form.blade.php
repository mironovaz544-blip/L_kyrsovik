@php
    $recipe = $recipe ?? null;
@endphp

<div class="space-y-4">

    <div>
        <label for="title" class="block text-xl font-medium text-green-600">Название рецепта</label>
        <input value="{{ old('title', $recipe?->title) }}" type="text" id="title" name="title" required
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm">
        @error('title')
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
        <label for="counts" class="block text-xl font-medium text-green-600">Состав продуктов</label>
        <input value="{{ old('counts', $recipe?->counts) }}" type="text" id="counts" name="counts" required
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm">
        @error('counts')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="process" class="block text-xl font-medium text-green-600">Процесс приготовления</label>
        <input value="{{ old('process', $recipe?->process) }}" type="text" id="process" name="process" required
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm">
        @error('process')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="type" class="block text-xl font-medium text-green-600">Тип</label>
        <input value="{{ old('type', $recipe?->type->label()) }}" type="text" id="type" name="type" required
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm">
        @error('type')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>


    @if(isset($recipe) && $recipe->mainPhoto)
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Текущая фотография
            </label>
            <div class="relative inline-block">
                <img src="{{ $recipe->mainPhoto->thumbnail_url }}" alt="Photo" class="w-48 h-32 object-cover rounded">
                <div class="mt-2">
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" name="delete_photo" value="1" class="mr-2">
                        <span class="text-sm text-red-600">Удалить фотографию</span>
                    </label>
                </div>
            </div>
        </div>
    @endif
    <div>
        <label for="photo" class="block text-sm font-medium text-black mb-1">
            {{ isset($recipe) && $recipe->mainPhoto ? 'Заменить фотографию' : 'Фотография' }}
        </label>
        <input type="file" name="photo" id="photo" accept="image/jpeg, image/jpg, image/png, image/webp"
               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-pink-500">
        <p class="text-xs text-gray-500 mt-1">JPEG, PNG, WebP,макс. 5MB</p>
    </div>


<div class="flex gap-2">
    <button type="submit" class="bg-pink-600 hover:bg-pink-700 text-white font-medium py-2 px-4 rounded">
        {{ isset($recipe) ? 'Обновить' : 'Создать' }}
    </button>
    <a href="{{ route('recipes.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium py-2 px-4 rounded">Отмена</a>
</div>



</div>


