<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Sub_category;
use Illuminate\Http\Request;
use DB;
use Validator;
use Importer;

class ProductController extends Controller
{
    public function index()
    {
        // $data = Product::paginate(5);
        $data = Product::all();
        $categories = Category::all();
        $sub_categories = Sub_category::all();
        return view('products.index', compact('data', 'categories', 'sub_categories'));

        // $categories = Category::where('name', 'arts')->orWhere('name', 'punjabi')->with('products')->get();
        // foreach ($categories as $category) {
        //     dd($category);
        // }
        // dd($categories);
        // $products = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.id')
        //                         ->select('products.*', 'categories.name')
        //                         ->where('categories.name', '=', 'arts')
        //                         ->orWhere('categories.name', '=', 'punjabi')
        //                         ->get();
        // dd($products); 
    }

    public function create()
    {
        $categories = Category::all();
        $sub_categories = Sub_category::all();
        return view('products.create', compact('categories', 'sub_categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
           'name'      => 'required|max:200',
           'description'=> 'required',
           'category_id'      => 'required|numeric',
           'sub_category_id'      => 'required|numeric',
           
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;

        $images = $request->file('picture');
        foreach($images as $image){
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image.'.'.$ext;
            $upload_path='images';
            // $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);   
            $product->picture = $success;
        } 

        $product->save();
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $sub_categories = Sub_category::all();
        return view('products.edit', compact('product', 'categories', 'sub_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
           'name'      => 'required|max:200',
           'price'      => 'numeric',
           'selling_price'   => 'numeric',
           'category_id'      => 'required|numeric',
           'sub_category_id'      => 'required|numeric',
        ]);



        $product = Product::find($id);       
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return back();
    }


    // Search product
    public function search_product_view(Request $request)
    {   
        // dd($request);
        $query = $request->get('query');
        // dd($query);
        $data = DB::table('products')
                        ->where('name', 'like', '%'.$query.'%')
                        ->orWhere('category_id', 'like', '%'.$query.'%')
                        ->orderBy('id', 'desc')
                        ->get();
        // dd($data);   
        $categories = Category::all();
        $sub_categories = Sub_category::all();             
        // return view('search', compact('data', 'categories', 'sub_categories'));
        return view('search', compact('data', 'categories', 'sub_categories'));
    }

    public function import_file()
    {
        return view('excelTest');
    }

    public function import_excel(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:xlsx, xls,csv'
        ]);

        if($validator->passes()){
            $file = $request->file('file');
            $date = date('Ymd_His');
            $fileName = $date.'_'.$file->getClientOriginalName();
            $uploadPath = public_path('upload/');
            $file->move($uploadPath, $fileName);

            $excel = Importer::make('Excel');
            $excel->load($uploadPath.$fileName);
            $collection = $excel->getCollection();

           

            if(sizeof($collection[1]) == 5){
                for($row = 1; $row < sizeof($collection); $row++){
                    try {
                        $product = new Product;
                        $product->id = $collection[$row][0];
                        $product->name = $collection[$row][1];
                        $product->description = $collection[$row][2];
                        $product->price = $collection[$row][3];
                        $product->quantity = $collection[$row][4];
                        $product->save();
                    } catch (Exception $e) {
                        return redirect()->back()->with(['errors' => $e->getMessage()]);
                    }
                }
            } else {
                return redirect()->back()->with(['errors' => [0 => 'Please provide valid data']]);
            }

        } else {
            return redirect()->back()->with(['errors' => $validator->errors()->all()]);
        }
    }
}
