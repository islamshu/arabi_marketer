<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Followr extends Model
{
    use HasFactory;
    /**
     * Get the user that owns the Followr
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function marketer()
    {
        return $this->belongsTo(User::class, 'marketer_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
