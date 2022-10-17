<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Podacst extends Model
{
    use HasFactory,SoftDeletes;
    public function category()
    {
        return $this->belongsToMany(Category::class, 'podcast_categories','podcast_id', 'category_id');
    }
    public function keywords()
    {
        return $this->belongsToMany(KeyWord::class, 'podacst_keywords','podcast_id', 'keyword_id');
    }
    /**
     * Get the user that owns the Podacst
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
