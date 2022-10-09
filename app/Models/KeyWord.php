<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class KeyWord extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title'];
    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }
}
