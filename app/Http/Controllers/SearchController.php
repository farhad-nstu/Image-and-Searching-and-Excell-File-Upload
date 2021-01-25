<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;
use App\Category;
use App\Sub_category;

class SearchController extends Controller
{
    public function search_product(Request $request)
    {
    	$search = $request->search;
    	$data['products'] = Product::where('name', $search)->first();
    	
    	if($data['products']){
    		$data['products'] = Product::where('name', $search)->first();
    		$categories = Category::all();
        	$sub_categories = Sub_category::all();
    		return view('search', compact('data', 'categories', 'sub_categories'));
    	} else {
    		return redirect()->back()->with('error', 'No product match');
    	}
    }


    public function get_product(Request $request)
    {
    	$search = $request->search;
    	$productData = DB::table('products')
    					->where('name', 'LIKE', '%'.$search.'%')
    					->get();
    	$html = '';
    	$html .= '<div><ul>';
    	if($productData){
    		foreach($productData as $v){
    			$html .= '<li>'.$v->name.'</li>';
    		}
    		$html .= '</ul></div>';
    		return response()->json($html);
    	}
    }



}
