<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Blog extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title','description'];
    public function category()
    {
        return $this->belongsToMany(Category::class, 'blog_categories','blog_id', 'category_id');
    }
    public function keywords()
    {
        return $this->belongsToMany(KeyWord::class, 'blog_keywords','blog_id', 'keyword_id');
    }
    /**
     * Get the user that owns the Blog
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get all of the comments for the Blog
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function rate()
    {
        return $this->hasMany(RateBlog::class);
    }
}
