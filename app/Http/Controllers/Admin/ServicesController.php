<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AdminService;
use App\Models\Order;
use App\Models\User;

class ServicesController extends Controller
{
    private $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

     ## view admin index ##
     public function index()
     {
         $orders_count = Order::count();
         $users_count   = User::count();
         return view('admin.home')->with(['orders_count'=>$orders_count,'users_count'=>$users_count]);
 
     }
    ## view all the categories index ##
    public function categories()
    {
        $Categories = $this->adminService->categories();
        return view('admin.categories')->with('categories',$Categories);

    }
    ## view all the products index ##
    public function products()
    {
        $Products = $this->adminService->products();
        return view('admin.products')->with('products',$Products);

    }
     ## view all the units  index##
     public function units()
     {
        $Units = $this->adminService->units();
        return view('admin.units')->with('units',$Units);
 
     }

     ## view all the registered users##
     public function users()
     {
        $Users = $this->adminService->users();
        return view('admin.users')->with('users',$Users);
 
     }
       ## view all the orders ##
       public function orders()
       {
          $Orders = $this->adminService->orders();
           return view('admin.orders')->with('orders',$Orders);
   
       }
       ## show specific order##
       public function show($id)
       {
        $Order = $this->adminService->show($id);
        return view('admin.show_order')->with('order',$Order);
   
       }
   

}
