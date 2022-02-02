<x-layout>

<a href="/"><h1>{!! $post->title !!}</h1></a>

<div>{!! $post->body !!}</div>

    <p>
        <a href="#">{{ $post->category->name }}</a>
    </p>

</x-layout>
