<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetiles extends Model
{
    use HasFactory;
    protected $guarded=[];
    /**
     * Get the user that owns the OrderDetiles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function service()
    {
        return $this->belongsTo(Service::class, 'product_id')->withTrashed();
    }
    public function consultion()
    {
        return $this->belongsTo(Consulting::class, 'product_id');
    }
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

}
