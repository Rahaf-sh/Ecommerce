<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::Create(
            ['name' => "Fruits",'description' => "Lorem ipsum dolor sit amet",'image' => "images/categories/fruits.png"],
        );

        Category::Create(
            ['name' => "Vegetables",'description' => "Lorem ipsum dolor sit amet",'image' => "images/categories/vegetables.png"],
            
        );
 
    }
}