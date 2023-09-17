<x-layout>
    <x-setting :header="'Edit Post: ' . $post->title">
        <form action="/admin/posts/{{ $post->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="title" :value="$post->title"/>
            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" :value="$post->thumbnail" :req="''"/>
                </div>

                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl ml-2" width="100">
            </div>
            <x-form.textarea name="excerpt" :text="$post->excerpt"/>
            <x-form.textarea name="body" :text="$post->body"/>
            <x-form.select name="category" :itemlist="$categories" :selectedValue="$post->category_id"/>

            <x-form.button>Update</x-form.button>
        </form>
    </x-setting>
</x-layout>
