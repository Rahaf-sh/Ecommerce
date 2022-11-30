<?php


namespace App\Repositories;
use App\Repositories\Interfaces\AdminRepositoryInterface;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Unit;
use App\Models\Order;

class AdminRepository implements AdminRepositoryInterface
{

    ## view all the categories index ##
    public function categories()
    {  
        $Categories = Category::all();
        return $Categories;

    }
    ## view all the products index ##
    public function products()
    {
        $Products = Product::all();
        return $Products;

    }
     ## view all the units  index##
     public function units()
     {
         $Units = Unit::all();
         return $Units;
 
     }

     ## view all the registered users##
     public function users()
     {
         $Users = User::all();
         return $Users;
 
     }
       ## view all the orders ##
       public function orders()
       {
           $Orders = Order::all();
           return $Orders;
   
       }
       ## show specific order##
       public function show($id)
       {
           $Order = Order::find($id);
           return $Order;
   
       }
}
