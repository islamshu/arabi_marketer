<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory,SoftDeletes;
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
    public function extra()
    {
        return $this->hasMany(ExtraService::class, 'service_id')->orderBy('id','desc');;
    }
    /**
     * Get the user that owns the Service
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get all of the comments for the Service
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(ServiceComment::class);
    }
}
