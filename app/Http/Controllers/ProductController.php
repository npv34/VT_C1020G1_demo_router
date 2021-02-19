<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    function create() {
        $categories = Category::all();
        return view('back-end.products.add', compact('categories'));
    }

    function store(Request $request) {
        $product = new Product();
        $product->fill($request->all());
        $product->slug = Str::slug($request->name);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('products', 'public');
            $product->img = $path;
        }

        $product->save();
    }

    function index() {
//        $products = Product::all();
        return view('back-end.products.list');
    }

    function getAll(): \Illuminate\Http\JsonResponse
    {
        $products = Product::with('category')->get();
        return response()->json($products);
    }

    function destroy($id) {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json([
            'message' => 'Delete success'
        ]);
    }
}
