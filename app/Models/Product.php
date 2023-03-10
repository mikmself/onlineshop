<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'desc',
        'img',
        'price',
        'stock',
    ];
    public function cart(){
        return $this->hasMany(Cart::class,'product_id');
    }
    public function order(){
        return $this->hasMany(Order::class,'product_id');
    }
}
