<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json(['success' => true, 'data' => $categories]);
    }

    public function store(Request $request)
    {
        $category = Category::create($request->all());
        return response()->json(['success' => true, 'data' => $category]);
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return response()->json(['success' => true, 'data' => $category]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return response()->json(['success' => true, 'data' => $category]);
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return response()->json(['success' => true, 'message' => 'Category deleted']);
    }
}
