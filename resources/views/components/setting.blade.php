@props(['header'])
<section class="px-6 py-8 max-w-4xl mx-auto">
    <h1 class="text-center font-bold text-xl mb-10 pb-4 border-b">
        {{ $header }}
    </h1>

    <div class="flex space-x-8">
        <aside class="w-48 flex-shrink-0">
            <h4 class="font-semibold mb-6">Links</h4>

            <ul class="space-y-4">
                <li>
                    <a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-blue-500' : '' }}">Manage Posts</a>
                </li>
                <li>
                    <a href="/admin/categories" class="{{ request()->is('admin/categories') ? 'text-blue-500' : '' }}">Manage Categories</a>
                </li>
                <li>
                    <a href="/admin/tags" class="{{ request()->is('admin/tags') ? 'text-blue-500' : '' }}">Manage Tags</a>
                </li>
                <li>
                    <a href="/admin/posts/create" class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : '' }}">New Post</a>
                </li>
            </ul>
        </aside>

        <main class="flex-1">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>
