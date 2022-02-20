@props(['name'])

<div class="mb-6">
    <label class="block uppercase font-bold text-gray-700 text-xs mb-2" for="{{ $name }}">
        Exceprt
    </label>

    <textarea class="border border-gray-400 p-2 w-full" type="text" name="{{ $name }}" id="{{ $name }}" required>
    {{ old($name) }}
    </textarea>

    <x-form.error name="{{ $name }}" />
</div>
