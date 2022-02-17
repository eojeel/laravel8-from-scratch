<section class="col-span-8 col-start-5 m-10 space-y-4">
    @auth
    <x-panel>
        <form method="POST" action="/post/{{ $post->slug}}/comments">
            @csrf
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="60" height="60" class="rounded-full">
                <h2 class="ml-4">Want to Participate?</h2>
            </header>

            <div class="mt-6">
                <textarea name="body" class="w-full text-sm focus::outline-none focus:ring" cols="30" rows="5" placeholder="Comment!" required></textarea>

                @error('body')
                <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror

            </div>

            <div class="flex justify-end mt-8 pt-6 border-t border-gray-200">
                <x-submit-button>Comment</x-submit-button>
            </div>
        </form>
    </x-panel>
    @else
    <p class="font-semibold">
        <a class="hover:underline" href="/register">Register</a> Or <a class="hover:underline" href="/login">Log in to Comment</a>
    </p>
    @endauth
</section>
