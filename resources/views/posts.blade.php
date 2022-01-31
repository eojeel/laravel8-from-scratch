<x-layout>
@foreach($posts as $post)

<article class="{{ $loop->even ? 'mb-4' : '' }}">

    <a href="/post/{{ $post->slug}}">

    <h1>{{ $post->title }}</h1></a>

    <div>{!! $post->body !!}</div>

</article>

    @endforeach;

</x-layout>
