<x-layout>
    <x-settings :heading="'Edit Post:'. $post=>title">
        <form method="POST" action="/admin/post/{{ $post->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')


            <x-form.input name="title" :value="old('title', $post->title)" />
            <x-form.input name="slug" :value="old('slug', $post->slug)" />

            <div class="flex mt-6">
                <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)" />
                <img src="{{ asset('storage/'. $post->thumbnail) }}" alt="" class="rounded-xl" width="50">
            </div>

            <x-form.textarea name="exceprt"> {{ $post->exceprt }}</x-form.textarea>
            <x-form.textarea name="body">{{ $post->body }}</x-form.textarea>


            <div class="mb-6">
                <x-form.label name="Category" />

                <select name="category_id">
                    @foreach (\App\Models\Category::all() as $category)
                    <option value="{{ $post->category_id }}" {{ old('category_id') == $post->category_id ? 'selected' : ''}}>
                        {{ ucwords($category->name) }}
                    </option>

                    @endforeach
                </select>

                <x-form.error name="error" />
            </div>

            <x-submit-button>Update</x-submit-button>

        </form>
    </x-settings>
</x-layout>
