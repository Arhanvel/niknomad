<x-layout>
    <x-setting header="Manage Tags">
        <div class="flex flex-col">
            <form method="POST" action="/admin/tags">
                @csrf

                <div class="flex items-center">
                    <label for="cat_name" class="uppercase font-bold text-xs text-gray-700">Tag Name:</label>
                    <input class="border border-gray-400 p-2 rounded ml-4"
                           type="text"
                           name="name"
                           id="cat_name"
                           required
                    >
                    <button type="submit" class="bg-green-500 text-white uppercase font-semibold text-md py-2 px-10 rounded-2xl hover:bg-green-700 ml-4">
                        Add New
                    </button>
                </div>
            </form>
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($tagList as $tag)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <form method="POST" action="/admin/tags/{{ $tag->id }}">
                                            @csrf
                                            @method('PUT')

                                            <div class="flex items-center">
                                                <input class="border border-gray-400 p-2 w-full rounded"
                                                    type="text"
                                                    name="name"
                                                    required
                                                    value="{{ $tag->name }}"
                                                >

                                                <button type="submit" class="bg-blue-500 text-white uppercase font-semibold text-md py-2 px-10 rounded-2xl hover:bg-blue-700 ml-4">
                                                    Update
                                                </button>
                                            </div>
                                        </form>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form method="POST" action="/admin/tags/{{ $tag->id }}">
                                            @csrf
                                            @method('DELETE')

                                            <button class="text-md text-white uppercase bg-red-500 rounded-2xl hover:bg-red-600 px-4 py-2">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-6">
            {{ $tagList->links() }}
        </div>
    </x-setting>
</x-layout>
