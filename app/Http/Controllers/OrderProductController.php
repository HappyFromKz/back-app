<?php

namespace App\Http\Controllers;

use App\Models\OrderProduct;
use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    public function index()
    {
        $orderProducts = OrderProduct::with('order', 'product')->get();
        return response()->json(['success' => true, 'data' => $orderProducts]);
    }

    public function store(Request $request)
    {
        $orderProduct = OrderProduct::create($request->all());
        return response()->json(['success' => true, 'data' => $orderProduct]);
    }

    public function show($id)
    {
        $orderProduct = OrderProduct::with('order', 'product')->findOrFail($id);
        return response()->json(['success' => true, 'data' => $orderProduct]);
    }

    public function update(Request $request, $id)
    {
        $orderProduct = OrderProduct::findOrFail($id);
        $orderProduct->update($request->all());
        return response()->json(['success' => true, 'data' => $orderProduct]);
    }

    public function destroy($id)
    {
        OrderProduct::destroy($id);
        return response()->json(['success' => true, 'message' => 'OrderProduct deleted']);
    }
}
