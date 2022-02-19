
<x-layout>
    <section class="py-8 max-w-sm mx-auto">
    <h1 class="text-lg font-bold mb-2">
                 Publish New Post
            </h1>
        <x-panel class=" border">
        <form method="POST" action="/admin/post" enctype="multipart/form-data">
            @csrf

            <div class="mb-6">
                    <label class="block uppercase font-bold text-gray-700 text-xs mb-2" for="Title">
                        Title
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                    type="text"
                    name="title"
                    id="title"
                    value="{{ old('title') }}"
                    required>

                    @error('title')
                    <p class="text-red-500 text-xs italic">
                        {{ $message}}
                    </p>
                    @enderror
            </div>


            <div class="mb-6">
                    <label class="block uppercase font-bold text-gray-700 text-xs mb-2" for="Slug">
                    Slug
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                    type="text"
                    name="slug"
                    id="slug"
                    value="{{ old('slug') }}"
                    required>

                    @error('slug')
                    <p class="text-red-500 text-xs italic">
                        {{ $message}}
                    </p>
                    @enderror
            </div>

            <div class="mb-6">
                    <label class="block uppercase font-bold text-gray-700 text-xs mb-2" for="Thumbnail">
                    Thumbnail
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                    type="file"
                    name="thumbnail"
                    id="thumbnail"
                    required>

            </div>

            <div class="mb-6">
                    <label class="block uppercase font-bold text-gray-700 text-xs mb-2" for="Excerpt">
                    Exceprt
                    </label>

                    <textarea class="border border-gray-400 p-2 w-full"
                    type="text"
                    name="excerpt"
                    id="excerpt"
                    required>
                    {{ old('excerpt') }}
                    </textarea>

                    @error('excerpt')
                    <p class="text-red-500 text-xs italic">
                        {{ $message}}
                    </p>
                    @enderror
            </div>


            <div class="mb-6">
                    <label class="block uppercase font-bold text-gray-700 text-xs mb-2" for="Body">
                    Body
                    </label>

                    <textarea class="border border-gray-400 p-2 w-full"
                    type="text"
                    name="body"
                    id="body"
                    required>
                    {{ old('body') }}
                    </textarea>

                    @error('body')
                    <p class="text-red-500 text-xs italic">
                        {{ $message}}
                    </p>
                    @enderror
            </div>

            <div class="mb-6">
            <label class="block uppercase font-bold text-gray-700 text-xs mb-2" for="Category">
                    Category
                    </label>

                <select name="category_id">
                    @foreach (\App\Models\Category::all() as $category)
                        <option
                        value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : ''}}
                        >
                        {{ ucwords($category->name) }}</option>

                    @endforeach
                </select>
            </div>

            <x-submit-button>Publish</x-submit-button>

        </form>
        </x-panel>
    </section>
</x-layout>
