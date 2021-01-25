<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('products', 'ProductController');

Route::resource('customers', 'CustomerController');

Route::resource('categories', 'CategoryController');
Route::resource('sub_categories', 'SubCategoryController');


///// Search ////
Route::post('product/search', 'SearchController@search_product')->name('product.search'); 
Route::get('find/product', 'SearchController@get_product')->name('get.product'); 


///// excel ////
Route::get("/import", "ProductController@import_file");
Route::post("/import", "ProductController@import_excel")->name('excel.import');


//// User ////
Route::get("all_products", "User\ProductsController@products")->name("allProducts");
Route::get("product-order/{id}", "OrderController@product_order")->name("product.order");
Route::post("store-product-order/{id}", "OrderController@store_product_order")->name("order.store");


