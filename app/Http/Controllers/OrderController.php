<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use App\Product;
use Auth;

class OrderController extends Controller
{
    public function product_order($id)
    {
        $product = Product::find($id);
        return view('ProductOrder', compact('product'));
    }

    public function store_product_order(Request $request, $id)
    {
        $product = Product::find($id);
        $product_price = $product->price;
        // dd($product_price);
        $product_name = $product->name;

        $client_id = Auth::user()->id;

        $order = new Order;
        $order->client_id = $client_id;
        $order->product_name = $product_name;

        $get_size = $request->size;
        $get_quantity = $request->quantity;

        $order->size = $get_size;
        $order->quantity = $get_quantity;

        // dd($get_quantity);

        switch($get_size){
            case "S":
                $price = $get_quantity*($product_price-10);
            break;
            case "M":
                $price = $get_quantity*($product_price-5);
            break;
            default:
                $price = $get_quantity*$product_price;
        }

        $order->price = $price;

        $order->save();
        return redirect()->route('allProducts');

    }
}
