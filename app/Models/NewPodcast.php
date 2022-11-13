<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewPodcast extends Model
{
    use HasFactory;
    /**
     * Get the user that owns the NewPodcast
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function keywords()
    {
        return $this->belongsToMany(KeyWord::class, 'podacst_keywords','podcast_id', 'keyword_id');
    }
    /**
     * Get the user associated with the NewPodcast
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function manual()
    {
        return $this->hasOne(OwenPodcast::class, 'podcast_id');
    }

}
