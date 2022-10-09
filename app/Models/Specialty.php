<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Specialty extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title'];
    public function getFullNameAttribute()
        {
            return "{$this->image}"."tt";
        }
}
