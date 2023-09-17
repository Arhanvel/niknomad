<header class="max-w-4xl mx-auto mt-20 text-center">
    <div class="max-w-xl mx-auto">
        <h1 class="text-4xl">
            Welcome to <span class="text-blue-500">digital nomad</span> blog
        </h1>
    </div>

    <div class="flex justify-center mt-4 items-center gap-3">
        <!-- Categories -->
        <span class="bg-gray-100 inline-block rounded-xl inline-flex relative items-center">
            <x-category-dropdown />
        </span>

        <span class="bg-gray-100 inline-block rounded-xl inline-flex relative items-center">
            <form action="/" method="GET">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif

                <input type="text"
                       name="search"
                       placeholder="Find something"
                       class="bg-transparent rounded-xl py-2 px-3 outline-none placeholder-black font-semibold text-sm"
                       value="{{ request('search') }}"
                >
            </form>
        </span>
    </div>
</header>
