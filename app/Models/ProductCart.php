<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCart extends Model
{
    use HasFactory;

    // Les colonnes qui sont autorisées à être assignées en masse
    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',
        'unit_price'
    ];

    protected $table = 'product_cart';

    public $timestamps = false;

    // Relation avec le modèle Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Relation avec le modèle Cart
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

}
