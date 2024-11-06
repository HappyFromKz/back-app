<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user', 'products')->get();
        return response()->json(['success' => true, 'data' => $orders]);
    }

    public function store(Request $request)
    {
        $order = Order::create($request->all());
        return response()->json(['success' => true, 'data' => $order]);
    }

    public function show($id)
    {
        $order = Order::with('user', 'products')->findOrFail($id);
        return response()->json(['success' => true, 'data' => $order]);
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->all());
        return response()->json(['success' => true, 'data' => $order]);
    }

    public function destroy($id)
    {
        Order::destroy($id);
        return response()->json(['success' => true, 'message' => 'Order deleted']);
    }
}

