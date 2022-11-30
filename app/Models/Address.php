<?php

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use SoftDeletes;

   
    protected $fillable = [ 'street', 'city', 'state', 'zipcode', 'country','customer_id'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
 
}