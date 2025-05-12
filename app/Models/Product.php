<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\HasMany;

    class Product extends Model
    {
        protected $fillable = [
            'category_id',
            'name',
            'price',
            'description',
            'image',
            'in_stock',
            'size',
        ];

        
        public function orders()
        {
            return $this->belongsToMany(Order::class, 'order_items')
                        ->withPivot('quantity', 'price')
                        ->withTimestamps();
        }

        // Аксессор для получения полного URL изображения
        public function getImageUrlAttribute()
        {
            return asset('storage/' . $this->image); // Предполагая, что изображения хранятся в storage/app/public
        }
    }