<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingConsultion extends Model
{
    use HasFactory,SoftDeletes;
    /**
     * Get the user that owns the BookingConsultion
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function consult()
    {
        return $this->belongsTo(Consulting::class,'consultiong_id');
    }
}
