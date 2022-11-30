<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
  
    ## view all the products index ##
    public function index()
    {
        $Products = Product::all();
        return response($Products);
    }
    ## view all the product details ##
    public function show($id)
    {
        $product  = Product::find($id);
        if($product){
            return view("productDetails")->with("product",$product);
        }
        else{
            return view("not found");
        }
    }

}
