
<x-layout>
<?php /*
@foreach($posts as $post)

<article class="{{ $loop->even ? 'mb-4' : '' }}">

    <a href="/post/{{ $post->slug }}"><h1>{!! $post->title !!}</h1></a>

    <p>
        By <a href="?author={{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
       </p>

    <div>{{ $post->excerpt }}</div>

    <p>
        <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
    </p>

</article>
    @endforeach
*/ ?>

        @include('posts._header');

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

            @if ($posts->count())

            <x-posts-grid :posts="$posts"/>

            @else
                <p style="text-center">No posts yet</p>
            @endif


        </main>

</x-layout>
