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
    protected $fillable = ['name','description','quantity','edition','type_id','condition','image','type_transaction','isAvailable'];

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

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
