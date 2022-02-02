<x-layout>
@foreach($posts as $post)

<article class="{{ $loop->even ? 'mb-4' : '' }}">

    <a href="/post/{{ $post->slug }}">

    {!! $post->title !!}</a>

    <div>{{ $post->excerpt }}</div>

</article>

    @endforeach;

</x-layout>
