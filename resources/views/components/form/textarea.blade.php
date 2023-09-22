@props(['name', 'text' => old($name)])

<x-form.field>
    <x-form.label name="{{ $name }}"/>

    <textarea class="border border-gray-200 p-2 w-full rounded"
              name="{{ $name }}"
              id="{{ $name }}"
    >{{ $text }}</textarea>

    <x-form.error name="{{ $name }}"/>
</x-form.field>
