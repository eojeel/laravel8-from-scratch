<x-layout>

@foreach($posts as $post)

<article class="{{ $loop->even ? 'mb-4' : '' }}">

    <a href="/post/{{ $post->slug }}"><h1>{!! $post->title !!}</h1></a>

    <p>
        By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
       </p>

    <div>{{ $post->excerpt }}</div>

    <p>
        <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
    </p>

</article>

    @endforeach


        @include('_posts-header');

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

            <x-post-featured-card/>

            <div class="lg:grid lg:grid-cols-2">

                <x-post-card />
                <x-post-card />

            </div>

            <div class="lg:grid lg:grid-cols-3">

                <x-post-card />
                <x-post-card />
                <x-post-card />

            </div>
        </main>

</x-layout>
