<footer class="bg-green-900 text-white mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-lg font-semibold mb-4">Быстрые ссылки</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('shop.index') }}" class="text-gray-400 hover:text-white transition duration 150 ease-in-out">Каталог
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('shop.index') }}" class="text-gray-400 hover:text-white transition duration 150 ease-in-out">О нас
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('shop.index') }}" class="text-gray-400 hover:text-white transition duration 150 ease-in-out">Контакты
                        </a>

                    </li>


                </ul>
            </div>
        </div>

        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
            <p> &copy; {{ date('Y') }} Литвинушка. Все права защищены.</p>

        </div>

    </div>
</footer>
