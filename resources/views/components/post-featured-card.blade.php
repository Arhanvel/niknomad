@props(['post'])

<article class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl cursor-pointer">
    <div class="py-6 px-4 lg:flex">
        <div class="flex-1 mr-8">
            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Иллюстрация к посту" class="rounded-xl">
        </div>

        <div class="flex-1 flex flex-col justify-between xs:mt-8 sm:mt-8 md:mt-8 lg:mt-0">
            <header>
                <div class="space-x-3">
                    <x-category-button :category="$post->category"/>

                    @foreach($post->tags as $tag)
                        <x-tag-button :tag="$tag"/>
                    @endforeach
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="/posts/{{ $post->slug }}" class="outline-none">
                            {{ $post->title }}
                        </a>
                    </h1>
                    <span class="mt-2 block text-gray-400 text-xs">
                        Опубликовано <time>{{ $post->created_at->diffForHumans() }}</time>
                    </span>

                </div>
            </header>

            <div class="text-sm mt-1 space-y-4">
                {!! $post->excerpt !!}
            </div>

            <footer class="flex justify-between items-center mt-2">
                <div class="flex items-center text-sm">
                    <img src="/images/avatar.jpg" alt="Author avatar" height="48" width="48" class="rounded-xl">
                    <div class="ml-3">
                        <h5 class="font-bold">
                            <a href="/?author={{ $post->author->username }}"> {{ $post->author->name }} </a>
                        </h5>
                        <h6>Цифровой кочевник</h6>
                    </div>
                </div>

                <div class="hidden lg:block">
                    <a href="/posts/{{ $post->slug }}" class="text-xs font-semibold bg-gray-300 rounded-full py-2 px-7">
                        Читать далее
                    </a>
                </div>
            </footer>
        </div>

    </div>
</article>
