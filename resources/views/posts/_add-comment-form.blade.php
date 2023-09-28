@auth()
    <x-panel>
        <form action="/posts/{{ $post->slug }}/comment" method="post">
            @csrf

            <header class="flex space-x-4 items-center mb-6">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="av" class="rounded-full" height="40" width="40">
                <h2>Оставьте свой комментарий</h2>
            </header>

            <x-form.field>
                <textarea
                    name="body"
                    id="body"
                    class="w-full rounded-xl focus:outline-none focus:ring"
                    cols="30"
                    rows="5"
                    placeholder="Ваш комментарий =)"
                    required
                ></textarea>
                <x-form.error name="body"/>
            </x-form.field>

            <x-form.button>Опубликовать</x-form.button>
        </form>
    </x-panel>
@else
    <p class="text-center text-lg font-semibold">
        <a href="/register" class="text-blue-500">Зарегистрируйтесь</a> или <a href="/login" class="text-blue-500">войдите</a> чтобы оставить комментарий
    </p>
@endauth
