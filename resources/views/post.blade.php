<!DOCTYPE html>
<link rel="stylesheet" href="/app.css">
<link rel="javascript" href="/app.js">
<title>My Blog</title>

<body>
<a href="/"><h1>{{ $post->title }}</h1></a>

<div>{!! $post->body !!}</div>

</body>
