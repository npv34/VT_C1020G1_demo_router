<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index() {
        return view('back-end.dashboard');
    }

    function showHomePage() {
        $products = Product::all();
        return view('front-end.home', compact('products'));
    }
}
