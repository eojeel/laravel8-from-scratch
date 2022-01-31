<!DOCTYPE html>
<link rel="stylesheet" href="/app.css">
<link rel="javascript" href="/app.js">
<title>My Blog</title>

<body>
    @foreach($posts as $post)
        <a href="/post/{{ $post->slug}}"><h1>{{ $post->title }}</h1></a>

        <div>{!! $post->body !!}</div>

        @endforeach;
</body>
