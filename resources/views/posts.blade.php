<!DOCTYPE html>
<link rel="stylesheet" href="/app.css">
<link rel="javascript" href="/app.js">
<title>Larvel 8 Up and running</title>

<body>

    @foreach($posts as $post)

    <article class="{{ $loop->even ? 'mb-4' : '' }}">

        <a href="/post/{{ $post->slug}}">

        <h1>{{ $post->title }}</h1></a>

        <div>{!! $post->body !!}</div>

    </article>

        @endforeach;

</body>
