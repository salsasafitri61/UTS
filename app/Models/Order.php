<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Order extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = ['user_id', 'address', 'payment_method', 'total_amount','phone'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

  public function products()
{
    return $this->belongsToMany(Product::class, 'order_product')
                ->withTrashed()  // Tambahkan ini untuk mengakses product yang di-soft delete
                ->withPivot('quantity', 'price')
                ->withTimestamps();
}
    public function carts()
{
    return $this->hasMany(Cart::class);
}

    
}
