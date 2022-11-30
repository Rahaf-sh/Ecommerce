<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use SoftDeletes;

    protected $fillable = ['order_id', 'product_id', 'quantity', 'amount'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

  
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

 
}