<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulting extends Model
{
    use HasFactory;
    protected $guarded=[];
    /**
     * Get the user that owns the Consulting
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
    public function place()
    {
        return $this->belongsTo(Placetype::class);
    }
    public function type()
    {
        return $this->belongsTo(Category::class);
    }

}
