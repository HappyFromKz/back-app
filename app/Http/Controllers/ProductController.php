<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return response()->json(['success' => true, 'data' => $products]);
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return response()->json(['success' => true, 'data' => $product]);
    }

    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return response()->json(['success' => true, 'data' => $product]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return response()->json(['success' => true, 'data' => $product]);
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return response()->json(['success' => true, 'message' => 'Product deleted']);
    }
}
