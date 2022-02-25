<x-layout>
    <x-settings heading="Publish New Post">
    <form method="POST" action="/admin/post" enctype="multipart/form-data">
                @csrf


                <x-form.input name="title" />
                <x-form.input name="slug" />
                <x-form.input name="thumbnail" type="file" />
                <x-form.textarea name="exceprt" />
                <x-form.textarea name="body" />


                <div class="mb-6">
                    <x-form.label name="Category" />

                    <select name="category_id">
                        @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : ''}}>
                            {{ ucwords($category->name) }}
                        </option>

                        @endforeach
                    </select>

                    <x-form.error name="error" />
                </div>

                <x-submit-button>Publish</x-submit-button>

            </form>
    </x-settings>
</x-layout>
