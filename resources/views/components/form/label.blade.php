@props(['name'])

<label class="block uppercase font-bold text-gray-700 text-xs mb-2" for="{{ $name }}">
    {{ ucwords($name) }}
</label>
