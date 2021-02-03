<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function getProductByCategoryId($id){
        $products = Category::find($id)->products;
        dd($products);
    }
}
