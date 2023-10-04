@props(['name', 'itemlist', 'selectedValue' => old($name)])

<x-form.field>
    <x-form.label name="{{ $name }}"/>

    <select name="{{$name}}[]" id="{{$name}}" multiple>
        @foreach($itemlist as $item)
            <option
                value="{{ $item->id }}"
                {{ $selectedValue ? $selectedValue->contains($item) ? 'selected' : '' : ''}}
            >{{ ucwords($item->name) }}</option>
        @endforeach
    </select>

    <x-form.error name="{{ $name }}"/>
</x-form.field>
