<?php

namespace App\Traits;

use App\Models\Address;

trait InteractsWithAddress
{
  
    public function setAddress($request,$customer)
    {
        $customerId = $customer->id;
       
        Address::create([
            'street'      => $request['street'],
            'city'        => $request['city'],
            'state'       => $request['state'] ?? null,
            'zipcode'     => $request['zipcode'] ?? null,
            'country'     => $request['country'],
            'customer_id' => $customerId
            
        ]);
    }
}