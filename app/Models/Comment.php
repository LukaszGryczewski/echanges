<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        //'user_id',
        'product_id',
        'comment',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comments';

   /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    public function product(){
        return $this->belongsTo(Product::class);
    }

    /*public function user(){
        return $this->belongsTo(User::class);
    }*/


}
