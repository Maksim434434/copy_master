<?php
// app/Models/Product.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'brand',
        'category',
        'price',
        'stock',
        'description',
        'image',
        'specifications',
        'is_active'
    ];

    protected $appends = ['formatted_price', 'image_url'];

    public function getFormattedPriceAttribute()
    {
        return number_format($this->price, 0, '', ' ') . ' ₽';
    }

    public function getImageUrlAttribute()
    {
        // Если изображения нет вообще или пустая строка
        if (empty($this->image)) {
            return $this->getPlaceholderImage();
        }
        
        // Если это уже полный URL (например, из сидера или дефолтные изображения)
        if (str_starts_with($this->image, 'http')) {
            return $this->image;
        }
        
        // Если файл существует в хранилище
        if (Storage::disk('public')->exists($this->image)) {
            return Storage::disk('public')->url($this->image);
        }
        
        // Если файл не найден, возвращаем placeholder
        return $this->getPlaceholderImage();
    }

    protected function getPlaceholderImage()
    {
        // Возвращаем локальный placeholder
        return asset('images/placeholder-product.jpg');
    }

    // Для маршрутизации по ID (вместо slug)
    public function getRouteKeyName()
    {
        return 'id';
    }

    /**
     * Получить спецификации как массив
     */
    public function getSpecificationsArrayAttribute()
    {
        if (empty($this->specifications)) {
            return [];
        }

        if (is_string($this->specifications)) {
            return json_decode($this->specifications, true) ?? [];
        }

        return $this->specifications;
    }
}