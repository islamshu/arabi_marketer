<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title','description'];
    /**
     * Get all of the comments for the Service
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function specialty()
    {
        return $this->belongsToMany(Specialty::class, 'service_specialies','service_id', 'specialts_id');
    }
    public function category()
    {
        return $this->belongsToMany(Category::class, 'service_categories','service_id', 'category_id');
    }
    public function keywords()
    {
        return $this->belongsToMany(KeyWord::class, 'service_keywords','service_id', 'keyword_id');
    }
    public function files()
    {
        return $this->hasMany(ServiceFiles::class, 'service_id');
    }
}
