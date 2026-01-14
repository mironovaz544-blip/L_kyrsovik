@extends('layouts.shop')
@section('title', $recipe->title . '- Вкусняшка')
@section('content')

    <div class="bg-green-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            @if(session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg flex items-center justify-between">
                    <div class="flex-items-center">
                        <svg class="h-5 w-5 text-green-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd">
                            </path>
                        </svg>
                        <span{{ session('success') }}></span>
                    </div>
                </div>
            @endif

            <nav class="flex mb-8" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('shop.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-green-600">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                            </svg>
                            Главная
                        </a>
                    </li>
                    <li>
                        <div  class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">{{ $recipe->title }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="lg:grid lg:grid-cols-2 lg:gap-x-8 lg:items-start">
                <div class="flex flex-col">
                    <div class="w-full aspect-w-1 aspect-h-1 bg-gradient-to-br from-lime-200 to-green-500 rounded-lg overflow-hidden">
                        <div class="w-full h-96 flex items-center justify-center">
                            <svg class="h-32 w-32 text-white opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="mt-10 px-4 sm:px-0 sm:mt-16 lg:mt-0">
                    <div class="mb-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800">
                          {{ $recipe->type->label() ?? 'Рецепт' }}
                        </span>
                    </div>

                    <h1 class="text-3xl font-bold tracking-tight text-green-500 sm:text-4xl">{{ $recipe->title }}</h1>

                    <div class="mt-6">
                        <x-rating-stars :rating="$recipe->averageRating()" :count="$recipe->reviewsCount()" size="lg"/>
                    </div>

                    <div class="mt-6">
                        <h3 class="text-sm font-medium text-gray-900">Описание</h3>
                        <div class="mt-4 prose prose-sm text-gray-500">
                            <p>{{ $recipe->description ?? 'Описание отсутствует' }}</p>
                        </div>
                    </div>

                </div>
            </div>

                <div class="mt-10">
                    <h3 class="text-2xl font-medium text-green-500">Набор продуктов:</h3>
                </div>
                <div  class="flex items-center mt-8">
                    <h1 class="text-xl  tracking-tight text-gray-900 sm:text-xl">{{ $recipe->counts }}</h1>
                </div>
                <div class="mt-10">
                    <h3 class="text-2xl font-medium text-green-500">Процесс приготовления:</h3>
                </div>
                <div class="mt-8 text-xl  tracking-tight text-gray-600 sm:text-xl">
                        <h1>{{ $recipe->process }}</h1>
                    </div>


            <div class="mt-16 border-t border-gray-200 pt-10">
                <h2 class="text-2xl font-bold text-gray-900 mb-8">Отзывы покупателей</h2>

                @if($recipe->reviews->isEmpty())
                    <div class="text-center py-12 bg-gray-50 rounded-lg">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Отзывов пока нет</h3>
                        <p class="mt-1 text-sm text-gray-500">Будьте первым, кто оставит отзыв</p>
                    </div>

                @else
                    <div class="space-y-6">
                        @foreach($recipe->reviews as $review)
                            <div class="bg-white border border-gray-200 rounded-lg p-6">
                                <div class="flex items-start justify-between">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <div class="h-10 w-10 rounded-full bg-indigo-600 flex items-center justify-center text-white font-semibold">
                                                {{ strtoupper(substr($review->user->name, 0, 1)) }}
                                            </div>
                                        </div>

                                        <div class="ml-4">
                                            <h4 class="text-sm font-bold text-gray-900">{{ $review->user->name }}</h4>
                                            <p class="text-sm text-gray-500">{{ $review->created_at->format('d.m.y') }}</p>
                                        </div>
                                    </div>
                                    <div>
                                        <x-rating-stars :rating="$review->rating" :count="0" size="sm"/>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <p class="text-gray-700">{{ $review->comment }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                <div class="mt-10 bg-gray-50 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Оставить отзыв</h3>
                    @auth
                        <form action="{{ route('shop.review.store', $recipe) }}" method="POST" class="space-y-4">
                            @csrf
                            @if($errors->any())
                                <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg">
                                    <ul class="list-disc list-inside">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Ваша оценка</label>
                                <div class="flex items-center space-x-1">
                                    @for($i = 1; $i <= 5; $i++)
                                        <button type="button" class="rating-star text-gray-300 hover:text-yellow-400 transition-colors" data-rating="{{ $i }}">
                                            <svg class="h-8 w-8 fill-current" viewBox="0 0 20 20">
                                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                            </svg>
                                        </button>
                                    @endfor
                                </div>
                                <input type="hidden" name="rating" id="rating-input" value="5" required>
                            </div>

                            <div>
                                <label for="comment" class="block text-sm font-medium text-gray-700 mb-2">Ваш отзыв</label>
                                <textarea id="comment" name="comment" rows="4" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Поделитесь своим мнением о товаре..."></textarea>

                            </div>
                            <div>
                                <button type="submit" class="w-full sm:w-auto bg-gradient-to-br from-lime-200 to-green-500 hover:from-green-600 hover:to-lime-400 text-white font-semibold py-2 px-6 rounded-lg transition duration-150 ease-in-out">
                                    Отправить отзыв
                                </button>
                            </div>
                        </form>

                    @else
                        <div class="text-center py-8">
                            <p class="text-gray-600 mb-4">Чтобы оставить отзыв, необходимо войти в систему</p>
                            <button onclick="openModal('loginModal')"
                                    class="inline-block bg-gradient-to-br from-lime-200 to-green-500 hover:from-green-600 hover:to-lime-400 text-white font-semibold py-2 px-6 rounded-lg transition duration-150 ease-in-out">
                                Войти
                            </button>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const stars = document.querySelectorAll('.rating-star') ;
            const ratingInput = document.getElementById('rating-input');
            let  selectedRating = 5;

            updateStars(selectedRating);
            stars.forEach(star => {
                star.addEventListener('click', function () {
                    selectedRating = parseInt(this.dataset.rating);
                    ratingInput.value = selectedRating;
                    updateStars(selectedRating);
                });
                star.addEventListener('mouseenter', function () {
                    const hoverRating = parseInt(this.dataset.rating);
                    updateStars(hoverRating);
                });

            });
            document.querySelector('.rating-star').parentElement.addEventListener('mouseleave', function() {
                updateStars(selectedRating);
            });

            function updateStars(rating) {
                stars.forEach((star, index) => {
                    if(index < rating) {
                        star.classList.remove('text-gray-300');
                        star.classList.add('text-yellow-400');
                    } else {
                        star.classList.remove('text-yellow-400');
                        star.classList.add('text-gray-300');
                    }
                });
            }
        });

    </script>


@endsection

