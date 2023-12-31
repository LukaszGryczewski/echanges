<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'edition',
        'weight',
        'user_id',
        'type_id',
        'condition',
        'image',
        'type_transaction',
        'isAvailable'
    ];

    /**
     * The table addresses associated with the model Address.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'product_cart')
            ->withPivot('quantity', 'unit_price')
            ->withTimestamps();
    }

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        } else {
            return asset('storage/default_image.png');
        }
    }
}
