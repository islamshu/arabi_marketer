<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CategoryBlog extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title'];
    public function category()
    {
        return $this->morphOne(Category::class, 'categories', 'category_type', 'category_id', 'id');
    }
}
