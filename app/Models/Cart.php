<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'produit_id',
        'quantity',
        'price',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'carts';

   /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function produits()
    {
        return $this->belongsToMany(Produit::class);
    }
}
