<header class="max-w-4xl mx-auto mt-20 text-center">
    <div class="max-w-xl mx-auto">
        <h1 class="text-4xl">
            Добро пожаловать в блог <span class="text-blue-500">цифрового кочевника</span>
        </h1>
    </div>

    <div class="flex justify-center mt-4 items-center gap-3">
        <!-- Categories -->
        <span class="bg-gray-100 inline-block rounded-xl inline-flex relative items-center">
            <x-category-dropdown />
        </span>

        <!-- Tags -->
        <span class="bg-gray-100 inline-block rounded-xl inline-flex relative items-center">
            <x-tag-dropdown />
        </span>

        <span class="bg-gray-100 inline-block rounded-xl inline-flex relative items-center">
            <form action="/" method="GET">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif

                <input type="text"
                       name="search"
                       placeholder="Поиск..."
                       class="bg-transparent rounded-xl py-2 px-3 outline-none placeholder-black font-semibold text-sm"
                       value="{{ request('search') }}"
                >
            </form>
        </span>
    </div>
</header>
