<!doctype html>
<html>
    <head>
        <!-- Google tag (gtag.js) -->
        @php
            $tag = env('GOOGLE_TAG');
        @endphp
        @if(!request()->is('admin/*'))
            <script async src="https://www.googletagmanager.com/gtag/js?id={{$tag}}"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

                gtag('config', 'G-QGGHKQYJ25');
            </script>
        @endif

        <title>Nik Digital Nomad Blog</title>
        <link href="/style/tailwind.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.0/dist/cdn.min.js"></script>
        <link rel="apple-touch-icon" sizes="180x180" href="/images/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon-16x16.png">
        <link rel="manifest" href="/images/site.webmanifest">

        @stack('scripts')

        <style>
            html {
                scroll-behavior: smooth;
            }
        </style>
    </head>
    <body style="font-family: Open Sans, sans-serif">
        <section class="px-6 py-8">
            <nav class="md:flex md:justify-between md:items-center">
                <div>
                    <a href="/">
                        <img src="/images/up.png" alt="Digital Nomad Logo" width="165" height="16">
                    </a>
                </div>

                <div class="mt-8 md:mt-0 text-center flex items-center">
                    @auth
                        <x-dropdown>
                            <x-slot name="trigger">
                                <button class="text-xs text-black font-bold uppercase">Добро пожаловать, {{ auth()->user()->name }}</button>
                            </x-slot>

                            @admin
                                <x-dropdown-item href="/admin/posts" :active="request()->is('admin/posts')">Управление постами</x-dropdown-item>
                                <x-dropdown-item href="/admin/categories" :active="request()->is('admin/categories')">Управление категориями</x-dropdown-item>
                                <x-dropdown-item href="/admin/tags" :active="request()->is('admin/tags')">Управление тегами</x-dropdown-item>
                                <x-dropdown-item href="/admin/posts/create" :active="request()->is('admin/posts/create')">Новый пост</x-dropdown-item>
                            @endadmin

                            <x-dropdown-item href="#" x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()">Выход</x-dropdown-item>

                            <form id="logout-form" method="POST" action="/logout" class="hidden">
                                @csrf
                            </form>
                        </x-dropdown>
                    @else
                        <a href="/register" class="text-xs text-black font-bold uppercase">Регистрация</a>
                        <a href="/login" class="text-xs text-black font-bold uppercase ml-6">Вход</a>
                    @endauth
                    <a href="#newsletter"
                       class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 ml-4 rounded-full text-xs font-bold text-white uppercase py-3 px-4">Подпишись на обновления</a>
                </div>
            </nav>

            {{ $slot }}

            <footer id="newsletter" class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
                <img src="/images/avatar.jpg" alt="newsletter icon" width="140" height="140" class="m-auto rounded-3xl">
                <h5 class="text-2xl">Получай уведомления о новых постах</h5>
                <p class="text-sm">Только важные письма. Никакого спама</p>

                <div class="mt-10">
                    <div class="relative inline-block mx-auto md:bg-gray-300 rounded-full ">

                        <form action="/newsletter" method="post" class="md:flex justify-between items-center text-sm">
                            @csrf

                            <div class="md:py-3 md:px-5 flex">
                                <label for="email" class="hidden md:inline-block">
                                    <img src="/images/mail.svg" height="24" width="24" alt="" class="fill-gray-600">
                                </label>
                                <input id="email" name="email" type="email" placeholder="Ваш email-адрес"
                                       class="md:bg-transparent pl-4 outline-none">
                            </div>

                            <button type="submit"
                                    class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 md:ml-3 mt-4 md:mt-0 rounded-full text-xs font-bold text-white uppercase py-4 px-8">
                                Подписаться
                            </button>
                        </form>

                        @error('subscribe-email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </footer>
        </section>

        <x-flash />
    </body>
</html>
