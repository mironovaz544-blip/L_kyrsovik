@php
    $news = $news ?? null;
@endphp

<div class="space-y-4">

    <div>
        <label for="title" class="block text-xl font-medium text-green-600">Название статьи</label>
        <input value="{{ old('title', $news?->title) }}" type="text" id="title" name="title" required
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm">
        @error('title')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="description" class="block text-xl font-medium text-green-600">Описание</label>
        <input value="{{ old('description', $news?->description) }}" type="text" id="description" name="description" required
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm">
        @error('description')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="story" class="block text-xl font-medium text-green-600">Текст</label>
        <input value="{{ old('story', $news?->story) }}" type="text" id="story" name="story" required
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm">
        @error('story')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>



    <div>
        <label for="type" class="block text-xl font-medium text-green-600">Тип</label>

        <select id="type" name="type" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 sm:text-sm">
            <option value="">-- Выберите категорию --</option>
            @foreach(\App\Enums\NewsTypeEnum::cases() as $type)
                <option value="{{ $type->value }}"
                    {{ old('type', $news?->type?->value) == $type->value ? 'selected' : '' }}>
                    {{ $type->label() }}
                </option>
            @endforeach
        </select>

        @error('type')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    @if(isset($news) && $news->mainPhoto)
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Текущая фотография
            </label>
            <div class="relative inline-block">
                <img src="{{ $news->mainPhoto->thumbnail_url }}" alt="Photo" class="w-48 h-32 object-cover rounded">
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
            {{ isset($news) && $news->mainPhoto ? 'Заменить фотографию' : 'Фотография' }}
        </label>
        <input type="file" name="photo" id="photo" accept="image/jpeg, image/jpg, image/png, image/webp"
               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-pink-500">
        <p class="text-xs text-gray-500 mt-1">JPEG, PNG, WebP,макс. 5MB</p>
    </div>


    <div class="flex gap-2">
        <button type="submit" class="bg-pink-600 hover:bg-pink-700 text-white font-medium py-2 px-4 rounded">
            {{ isset($news) ? 'Обновить' : 'Создать' }}
        </button>
        <a href="{{ route('newss.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium py-2 px-4 rounded">Отмена</a>
    </div>



</div>


