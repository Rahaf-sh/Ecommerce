<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;


class CategoryController extends Controller
{
    ## view all the categories index ##
    public function index()
    {
        $Categories = Category::all();
        return response($Categories);

    }
    ## show only the products in the selected category ##
    public function show($id)
    {
        $category = Category::find($id);
        if($category){
            $products   = Product::where('category_id',$id)->get();
            return view("categoryProducts")->with("products",$products);
        }
        else{
            return response()->json(['code' => '0', 'message' => "Not Found!",'data'=> []], 404);
        }
     
    }

}
