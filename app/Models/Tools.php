<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tools extends Model
{
    use HasFactory;
    public function links()
    {
        return $this->hasMany(linkTool::class,'tool_id');
    }
}
