<?php


namespace App\Services;
use App\Repositories\Interfaces\AdminRepositoryInterface;
use Illuminate\Http\Request;

class AdminService
{
    protected $adminRepositoryInterface;

    public function __construct(AdminRepositoryInterface $adminRepositoryInterface)
    {
        $this->adminRepositoryInterface = $adminRepositoryInterface;
    }
      public function categories()
      {
        $categories = $this->adminRepositoryInterface->categories();
        return   $categories;
      }
      public function products()
      {
        $products = $this->adminRepositoryInterface->products();
        return   $products;
  
      }
       public function units()
       {
        $units = $this->adminRepositoryInterface->units();
        return   $units;
       }
  
       public function users()
       {
        $users = $this->adminRepositoryInterface->users();
           return   $users;
   
       }
        public function orders()
        {
            $orders = $this->adminRepositoryInterface->orders();
            return   $orders;
     
         }
         public function show($id)
         {
            $order= $this->adminRepositoryInterface->show($id);
             return $order;
     
         }
   
}
