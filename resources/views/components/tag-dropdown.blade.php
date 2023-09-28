<div>
    <x-dropdown>
        <x-slot name="trigger">
            <button class="py-2 pl-3 pr-9 font-semibold text-sm outline-none w-32 text-left inline-flex">
                {{ isset($currentTag) ? ucwords($currentTag->name) : 'Теги' }}
                <x-icon name="down-arrow" class="absolute right-2 pointer-events-none "/>
            </button>
        </x-slot>

        <x-dropdown-item href="/?{{ http_build_query(request()->except('tags', 'page')) }}" :active="!isset($currentTag)">Все</x-dropdown-item>

        @foreach($tags as $tag)
            <x-dropdown-item
                href="/?tags={{ $tag->slug }}&{{ http_build_query(request()->except('tags', 'page')) }}"
                :active='isset($currentTag) && $currentTag->id === $tag->id'
            >
                {{ ucwords($tag->name) }}
            </x-dropdown-item>
        @endforeach
    </x-dropdown>
</div>
