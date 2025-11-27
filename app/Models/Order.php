<?php
// app/Models/Order.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'customer_name',
        'customer_phone',
        'customer_email',
        'delivery_method',
        'delivery_address',
        'payment_method',
        'comment',
        'status',
        'total', // Изменили с total_amount на total
    ];

    protected $attributes = [
        'status' => 'pending',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'order_items')
            ->withPivot('quantity', 'price')
            ->withTimestamps();
    }

    public function getStatusText()
    {
        $statuses = [
            'pending' => 'Ожидание',
            'processing' => 'В обработке', 
            'completed' => 'Завершен',
            'cancelled' => 'Отменен',
            'new' => 'Новый'
        ];
        
        return $statuses[$this->status] ?? $this->status;
    }

    // Обновляем геттер для форматирования цены
    public function getFormattedTotalAttribute()
    {
        return number_format($this->total, 0, ',', ' ') . ' ₽';
    }
}