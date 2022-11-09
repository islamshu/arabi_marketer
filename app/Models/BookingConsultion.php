<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingConsultion extends Model
{
    use HasFactory;
    /**
     * Get the user that owns the BookingConsultion
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function consult()
    {
        return $this->belongsTo(Consulting::class,'consultiong_id');
    }
}
