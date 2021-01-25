<?php

namespace App\Http\Controllers;

use App\Sub_category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_categories = Sub_category::all();
        return view('sub_categories.index', compact('sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sub_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|max:200',          
         ]);
 
         $sub_category = new Sub_category;
         $sub_category->name = $request->name; 
         $sub_category->slug = $request->slug;       
         $sub_category->save();
 
         return redirect()->route('sub_categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sub_category  $sub_category
     * @return \Illuminate\Http\Response
     */
    public function show(Sub_category $sub_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sub_category  $sub_category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sub_category = Sub_category::find($id);
        return view('sub_categories.edit', compact('sub_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sub_category  $sub_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'      => 'required|max:200',  
         ]);
 
         $sub_category = Sub_category::find($id);
         $sub_category->name = $request->name;
         $sub_category->slug = $request->slug;
         $sub_category->save();
 
         return redirect()->route('sub_categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sub_category  $sub_category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub_ = Sub_category::find($id);
        $sub_->delete();
        return back();
    }
}
