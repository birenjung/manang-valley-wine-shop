<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    
    protected $fillable = [
        'user_id',
        'order_user_fullname',
        'order_user_email',
        'order_user_phone',
        'order_user_address',
        'order_products',
        'order_total',
        'order_delivery_address',
        'order_delivery_status',
        'order_status',
        'order_date',
        'delivered_at',
        'payment_status',
        'payment_method',
        'status_change_date',
    ];

    protected $casts = [
        'order_products' => 'array',
        'order_date' => 'datetime',
        'delivered_at' => 'datetime',
        'status_change_date'  => 'datetime',
    ];

    function orderItems()
    {
        return $this->hasMany(OrderDetail::class);
    }

      // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Helper method to get distinct statuses for filter options
    public static function getDistinctStatuses(): array
    {
        return self::distinct()->pluck('status')->filter()->toArray();
    }

    // Scope for applying filters (alternative approach)
    public function scopeFilter($query, array $filters)
    {
        return (new \App\Filters\OrderFilter($query, request()))->apply();
    }
}
