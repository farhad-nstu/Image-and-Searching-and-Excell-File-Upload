<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Sub_category;

class ProductsController extends Controller
{
    public function products()
    {
    	$data = Product::all();
        $categories = Category::all();
        $sub_categories = Sub_category::all();
        return view('products', compact('data', 'categories', 'sub_categories'));
    }

    
}
