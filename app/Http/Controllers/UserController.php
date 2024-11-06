<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json(['success' => true, 'data' => $users]);
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        return response()->json(['success' => true, 'data' => $user]);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json(['success' => true, 'data' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return response()->json(['success' => true, 'data' => $user]);
    }

    public function destroy($id)
    {
        User::destroy($id);
        return response()->json(['success' => true, 'message' => 'User deleted']);
    }
}
