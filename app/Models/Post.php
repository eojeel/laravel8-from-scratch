<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $with = ['category', 'author'];
    //protected $guarded = ['id'];
    //protected $fillable = ['title','except','body'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search)
        {
            $query
            ->where('title', 'like', '%'. $search .'%')
            ->orWhere('body', 'like', '%'. $search .'%');
        });

        $query->when($filters['category'] ?? false, function($query, $category)
        {

            $query->whereHas('category', fn($query) =>
            $query->where('slug', $category));
            /*
            $query
            ->whereExists(fn($query) =>
            $query->from('categories')
            ->whereColum('category_id', 'post.category_id')
            ->where('categories.slug', $category)
            );
            */
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
