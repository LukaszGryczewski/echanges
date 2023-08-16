<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'cart_id',
        'total_price',
        'order_date',
        'delivery_address',
        'order_status',
        'deleted_at'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*public function carts()
    {
        return $this->hasMany(Cart::class);
    }*/
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
}
