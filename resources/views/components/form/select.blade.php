@props(['name', 'itemlist', 'selectedValue' => old($name)])

<x-form.field>
    <x-form.label name="{{ $name }}" for="{{$name}}_id"/>

    <select name="{{$name}}_id" id="{{$name}}_id">
        @foreach($itemlist as $item)
            <option
                value="{{ $item->id }}"
                {{ $selectedValue === $item->id ? 'selected' : ''}}
            >{{ ucwords($item->name) }}</option>
        @endforeach
    </select>

    <x-form.error name="{{ $name }}"/>
</x-form.field>
