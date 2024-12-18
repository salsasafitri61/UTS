<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Product extends Model
{
     use HasFactory, SoftDeletes;  // Use SoftDeletes trait

    protected $dates = ['deleted_at'];  
    protected $fillable = [
        'name',
        'price',
        'description',
        'image',
        'category',
    ];

    // Relasi ke model Cart (produk dapat muncul di banyak keranjang)
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

      public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product')
                    ->withPivot('quantity', 'price')
                    ->withTimestamps();
    }
}
