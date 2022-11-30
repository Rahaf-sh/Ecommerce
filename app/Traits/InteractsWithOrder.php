<?php

namespace App\Traits;

use App\Models\Order;
use App\Traits\CreateCustomer;

trait InteractsWithOrder
{
    use CreateCustomer;
    
    public function createOrder($request,$user)
    {
        $customerId   = $this->createCustomer($request,$user);
        $invoice_no   =  $this->invoiceNumber();

        $order = Order::create([
            'invoice_no'     => $invoice_no,
            'grand_total'    => $request->totalPrice,
            'note'           => $request->note,
            'payment_method' => 'cash on delivery',
            'status'         => 'pending',
            'customer_id'    => $customerId
         ]);
         $cart = json_decode($request->cart);
         foreach($cart as $item){
            $order->orderItems()->create(
                [
                'product_id' => $item->id,
                'quantity'   => $item->quantity,
                'amount'     => $item->totalPrice,
                ]
            );
          
        }
        return $order;
    }

    protected function invoiceNumber()
    {
     $latest = Order::latest()->first();
     if(! $latest) {
        return 'ord0001';
     }
     $string = preg_replace("/[^0-9\.]/", '', $latest->invoice_no);
     return 'ord' . sprintf('%04d', $string+1);
    }

    
}