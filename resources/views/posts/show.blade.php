<x-layout>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6 pt-14">
        <article class="md:grid md:grid-cols-12 gap-x-10">
            <div class="col-span-4 text-center">
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl">
                <p class="mt-4 block text-gray-400 text-xs">
                    Опубликовано:
                    <time>{{ $post->created_at->translatedFormat("F j, Y, g:i a") }}</time>
                </p>

                <div class="flex items-center text-sm justify-center mt-4">
                    <img src="/images/avatar.jpg" alt="Author avatar" height="48" width="48" class="rounded-xl">
                    <div class="ml-3 text-left">
                        <h5 class="font-bold">
                            <a href="/?author={{ $post->author->username }}"> {{ $post->author->name }} </a>
                        </h5>
                        <h6>Цифровой кочевник</h6>
                    </div>
                </div>
            </div>

            <div class="col-span-8">
                <div class="flex justify-between mb-6 text-lg items-center -mt-14">
                    <x-link-back-home/>

                    <div class="space-x-3">
                        <x-category-button :category="$post->category"/>

                        @foreach($post->tags as $tag)
                            <x-tag-button :tag="$tag"/>
                        @endforeach
                    </div>
                </div>

                <h1 class="text-4xl font-bold mb-10">{{ $post->title }}</h1>

                <div class="space-y-6 text-lg">
                    {!! $post->body !!}
                </div>

                <div class="mt-10 text-lg">
                    <x-link-back-home/>
                </div>
            </div>

            <section class="col-span-8 col-start-5 mt-10 space-y-6">
                @include('posts._add-comment-form')

                @foreach($post->comments as $comment)
                    <x-post-comment :comment="$comment"/>
                @endforeach
            </section>
        </article>
    </main>
</x-layout>
