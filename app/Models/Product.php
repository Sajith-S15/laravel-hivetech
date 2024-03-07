<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'product_type_id',
        'category_id',
    ];

    public function type() : BelongsTo
    {
        return $this->belongsTo(ProductType::class, 'product_type_id');
    }

    public function category() : BelongsTo
    {
        return $this->BelongsTo(Category::class);
    }

    public function orderItems() : HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

}
