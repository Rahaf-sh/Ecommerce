<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Traits\InteractsWithOrder;


class OrderController extends Controller
{
    use InteractsWithOrder;
    
    public function placeOrder(Request $request)
    {
        $user = User::create([
            'name'     => $request->first_name.' '.$request->last_name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $order   = $this->createOrder($request,$user);
        return response()->json([
            'status' => 'success',
            'url' => route('checkout'),
        ]);
    }

  
}
