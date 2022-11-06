<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OwenPodcast extends Model
{
    use HasFactory;
    protected $guarded=[];
    /**
     * Get all of the comments for the OwenPodcast
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sounds()
    {
        return $this->hasMany(Sound::class, 'podcast_id');
    }
}
