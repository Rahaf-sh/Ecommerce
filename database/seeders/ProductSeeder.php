<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::Create(
            ['name' => "Banana",'sku' => "banana12",'description'=>"Lorem ipsum dolor sit amet",'price'=>"150",'quantity'=>"14",'image' => "/img/featured/feature-2.jpg",'category_id'=>1,'unit_id'=>1],
        );

        Product::Create(
            ['name' => "Apple",'sku' => "apple12",'description'=>"Lorem ipsum dolor sit amet",'price'=>"150",'quantity'=>"14",'image' => "/img/featured/feature-8.jpg",'category_id'=>1,'unit_id'=>1],
            
        );
    }
}