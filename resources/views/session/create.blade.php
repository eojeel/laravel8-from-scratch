<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
            <h1 class="text-center font-bold text-xl">Log in!</h1>

            <form method="POST" action="/session" class="mt-10">
                @csrf

                <x-form.input name="email" type="email" />
                <x-form.input name="password" type="password" />

                <div class="mb-6">

                <x-submit-button>Log in</x-submit-button>

                    @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li class="text-red-500 text-xl">{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

            </form>
            </x-panel>
        </main>
    </section>
</x-layout>
