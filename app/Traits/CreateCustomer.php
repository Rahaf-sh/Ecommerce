<?php

namespace App\Traits;

use App\Models\Customer;
use App\Traits\InteractsWithAddress;
trait CreateCustomer
{
    use InteractsWithAddress;
   
    public function createCustomer($request,$user)
    {
        $user_id  = $user->id;
        $customer = Customer::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'phone'      => $request->phone,
            'user_id'    => $user_id
        ]);

        ## Set billing address ##
        $this->setAddress($request,$customer);

        return $customer->id;
    }
}