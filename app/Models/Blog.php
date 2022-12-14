<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory,SoftDeletes;
    use HasTranslations;

    public $translatable = ['title','description'];
    public function category()
    {
        return $this->belongsToMany(Specialty::class, 'blog_categories','blog_id', 'category_id');
    }
    public function keywords()
    {
        return $this->belongsToMany(KeyWord::class, 'blog_keywords','blog_id', 'keyword_id');
    }
    /**
     * Get the user associated with the Blog
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function image_blog()
    {
        return $this->belongsTo(BlogImage::class,'image_id');
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
    public function media()
    {
        return $this->hasOne(BlogImage::class);
    }
    public function tags()
    {
        return $this->hasMany(Tag::class);
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
