<x-layout>
    @include('posts._header')

    <main class="max-w-6xl mx-auto mt-20 space-y-6">
        @if ($posts->count())
            <x-posts-grid :posts="$posts"/>

            {{ $posts->links() }}
        @else
            <p class="text-center w-full text-lg">Здесь ничего нет. Попробуйте заглянуть позднее</p>
        @endif
    </main>
</x-layout>
