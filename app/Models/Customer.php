<?php

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use SoftDeletes;

    protected $fillable = ['first_name','last_name','phone','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
   
    public function getFullName()
    {
        return "{$this->firstName} {$this->lastName}";
    }
    public function address()
    {
        return $this->hasMany(Address::class,'customer_id','id');
    }

}