<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    function addToCart($idProduct): \Illuminate\Http\RedirectResponse
    {
        $product = Product::find($idProduct);
        $oldCart = session('cart');
        $newCart = new Cart($oldCart);
        $newCart->addToCart($idProduct, $product);
        Session::put('cart', $newCart);
        return back();
    }

    function index() {
        $cart = \session('cart');
        return view('front-end.cart.index', compact('cart'));
    }
}
