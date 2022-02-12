<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 p-6 rounded-xl border-gray-300">
            <h1 class="text-center font-bold text-xl">Register</h1>

            <form method="POST" action="/register" class="mt-10">
                @csrf
            <div class="mb-6">
                    <label class="block uppercase font-bold text-gray-700 text-xs mb-2" for="name">
                        Name
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                    type="text"
                    name="name"
                    id="name"
                    required>

                    @error('name')
                    <p class="text-red-500 text-xs italic">
                        {{ $message}}
                    </p>
                    @enderror
            </div>

            <div class="mb-6">
                <label class="block uppercase font-bold text-gray-700 text-xs mb-2" for="username">
                    Username
                </label>

                <input class="border border-gray-400 p-2 w-full"
                type="text"
                name="username"
                id="username"
                required>

                @error('username')
                <p class="text-red-500 text-xs italic">
                    {{ $message}}
                </p>
                @enderror
            </div>

            <div class="mb-6">
                    <label class="block uppercase font-bold text-gray-700 text-xs mb-2" for="email">
                        Email
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                    type="email"
                    name="email"
                    id="email"
                    required>
            </div>

            <div class="mb-6">
                <label class="block uppercase font-bold text-gray-700 text-xs mb-2" for="password">
                    Password
                </label>

                <input class="border border-gray-400 p-2 w-full"
                type="password"
                name="password"
                id="password"
                required>

                @error('password')
                <p class="text-red-500 text-xs italic">
                    {{ $message}}
                </p>
                @enderror
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                    Register
                </button>
            </form>
        </main>
    </section>
</x-layout>
