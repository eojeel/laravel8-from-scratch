<x-layout>
@foreach($posts as $post)

<article class="{{ $loop->even ? 'mb-4' : '' }}">

    <a href="/post/{{ $post->id}}">

    {!! $post->title !!}</a>

    <div>{!! $post->body !!}</div>

</article>

    @endforeach;

</x-layout>
