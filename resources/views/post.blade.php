@extends('layout')

@section('content')

<a href="/"><h1>{{ $post->title }}</h1></a>

<div>{!! $post->body !!}</div>

@endsection
