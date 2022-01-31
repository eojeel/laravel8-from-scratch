@extends('layout')

@section('banner')

<h1> banner </h1>

@endsection

@section('content')

@foreach($posts as $post)

<article class="{{ $loop->even ? 'mb-4' : '' }}">

    <a href="/post/{{ $post->slug}}">

    <h1>{{ $post->title }}</h1></a>

    <div>{!! $post->body !!}</div>

</article>

    @endforeach;

@endsection
