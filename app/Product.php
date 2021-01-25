<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Sub_category;

class Product extends Model
{
    protected $fillable = [
        'name', 'buying_price', 'description', 'selling_price', 'picture', 'category_id', 'sub_category_id'
    ];
    public function category(){
    	return $this->belongsTo(Category::class);
    }

    public function sub_category(){
    	return $this->belongsTo(Sub_category::class);
    }
}
