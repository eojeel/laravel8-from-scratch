<?php
namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;

class post
{

    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->body = $body;
        $this->date = $date;
        $this->slug = $slug;
    }

/**
    public static function find($slug)
    {

    if(!file_exists($path = resource_path("posts/{$slug}.html")))
    {
        throw new ModelNotFoundException();
    }

    return cache()->remember("post.{$slug}", 10, fn() => file_get_contents($path));

    }
**/

    public static function all()
    {
        /*
        $files = File::files(resource_path("posts/"));

        return array_map(function ($file) {
            return $file->getContents();
        }, $files);
        */

        return cache()->rememberForever('posts.all',  function() {
            return  collect(File::files(resource_path('posts')))
            ->map(function ($file) {
                return YamlFrontMatter::parseFile($file);
            })
            ->map(function ($document) {
                return new Post($document->title, $document->excerpt, $document->date, $document->body(), $document->slug);
            })
            ->sortBy('date');
            });
    }


    public static function find($slug)
    {
        $posts = static::all();

        return $posts->firstWhere('slug', $slug);
    }
}
