<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'deleted_at'
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

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    //relation OneToOne betwen Cart and User
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_cart')
            ->withPivot('quantity', 'unit_price');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
