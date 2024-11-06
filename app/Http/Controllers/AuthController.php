<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Регистрация пользователя
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return response()->json(['success' => true, 'data' => $user], 201);
    }

    // Авторизация пользователя
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('YourAppName')->plainTextToken;

        return response()->json(['success' => true, 'token' => $token]);
    }

    // Выход пользователя
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['success' => true, 'message' => 'Logged out successfully']);
    }

    // Получение информации о текущем пользователе
    public function user(Request $request)
    {
        return response()->json(['success' => true, 'data' => $request->user()]);
    }
}
