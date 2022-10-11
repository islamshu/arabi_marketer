<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsToMany(Category::class, 'video_cateogries','video_id', 'category_id');
    }
    public function keywords()
    {
        return $this->belongsToMany(KeyWord::class, 'video_keywords','video_id', 'keyword_id');
    }
    /**
     * Get the user that owns the Video
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
