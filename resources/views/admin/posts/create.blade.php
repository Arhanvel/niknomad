<x-layout>
    <x-setting header="Создать новый пост">
        <form action="/admin/posts" method="post" enctype="multipart/form-data">
            @csrf

            <x-form.input name="title"/>
            <x-form.input name="thumbnail" type="file"/>
            <x-form.textarea name="excerpt"/>
            <x-form.textarea name="body"/>
            <x-form.select name="category" :itemlist="$categories"/>
            <x-form.multiselect name="tags" :itemlist="$tags" :selectedValue="$post->tags"/>

            <x-form.button>Опубликовать</x-form.button>
        </form>
    </x-setting>

    @push('scripts')
        <script src="/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            tinymce.init({
                selector: '#body'
            });
            tinymce.init({
                selector: '#excerpt'
            });
        </script>
    @endpush
</x-layout>
