<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title'];
    public function category()
    {
        return $this->morphTo();
    }
    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }
    /**
     * Get the user that owns the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function spatical()
    {
        return $this->belongsTo(Specialty::class, 'specialt_id');
    }
}
