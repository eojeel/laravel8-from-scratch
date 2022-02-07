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

</x-layout>
