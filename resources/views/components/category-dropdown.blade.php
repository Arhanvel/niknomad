<div>
    <x-dropdown>
        <x-slot name="trigger">
            <button class="py-2 pl-3 pr-9 font-semibold text-sm outline-none w-32 text-left inline-flex">
                {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Категории' }}
                <x-icon name="down-arrow" class="absolute right-2 pointer-events-none "/>
            </button>
        </x-slot>

        <x-dropdown-item href="/?{{ http_build_query(request()->except('category', 'page')) }}" :active="!isset($currentCategory)">Все</x-dropdown-item>

        @foreach($categories as $category)
            <x-dropdown-item
                href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}"
                :active='isset($currentCategory) && $currentCategory->id === $category->id'
            >
                {{ ucwords($category->name) }}
            </x-dropdown-item>
        @endforeach
    </x-dropdown>
</div>
