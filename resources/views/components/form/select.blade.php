@props(['name', 'itemlist', 'selectedValue' => old($name)])

<x-form.field>
    <x-form.label name="{{ $name }}"/>

    <select name="category_id" id="category_id">
        @foreach($itemlist as $item)
            <option
                value="{{ $item->id }}"
                {{ $selectedValue === $item->id ? 'selected' : ''}}
            >{{ ucwords($item->name) }}</option>
        @endforeach
    </select>

    <x-form.error name="{{ $name }}"/>
</x-form.field>
