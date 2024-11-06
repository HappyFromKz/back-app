<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderProductController;
use App\Http\Controllers\CategoryController;

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('/register', [AuthController::class, 'register']); // Регистрация пользователя
    Route::post('/login', [AuthController::class, 'login']); // Авторизация пользователя
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum'); // Выход пользователя
    Route::get('/me', [AuthController::class, 'user'])->middleware('auth:sanctum'); // Получение информации о текущем пользователе
});

// Управление пользователями
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', [UserController::class, 'index']); // Получить список пользователей
    Route::get('/users/{id}', [UserController::class, 'show']); // Получить информацию о конкретном пользователе
    Route::put('/users/{id}', [UserController::class, 'update']); // Обновить информацию о пользователе
    Route::delete('/users/{id}', [UserController::class, 'destroy']); // Удалить пользователя
});

// Управление продуктами
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/products', [ProductController::class, 'index']); // Получить список продуктов
    Route::get('/products/{id}', [ProductController::class, 'show']); // Получить информацию о конкретном продукте
    Route::post('/products', [ProductController::class, 'store']); // Создать новый продукт
    Route::put('/products/{id}', [ProductController::class, 'update']); // Обновить продукт
    Route::delete('/products/{id}', [ProductController::class, 'destroy']); // Удалить продукт
});

// Управление категориями
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/categories', [CategoryController::class, 'index']); // Получить список категорий
    Route::get('/categories/{id}', [CategoryController::class, 'show']); // Получить информацию о конкретной категории
    Route::post('/categories', [CategoryController::class, 'store']); // Создать новую категорию
    Route::put('/categories/{id}', [CategoryController::class, 'update']); // Обновить категорию
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy']); // Удалить категорию
});

// Управление заказами
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/orders', [OrderController::class, 'index']); // Получить список заказов
    Route::get('/orders/{id}', [OrderController::class, 'show']); // Получить информацию о конкретном заказе
    Route::post('/orders', [OrderController::class, 'store']); // Создать новый заказ
    Route::put('/orders/{id}', [OrderController::class, 'update']); // Обновить заказ
    Route::delete('/orders/{id}', [OrderController::class, 'destroy']); // Удалить заказ
});

// Управление товарами в заказе
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/order-products', [OrderProductController::class, 'store']); // Добавить товары в заказ
    Route::delete('/order-products/{id}', [OrderProductController::class, 'destroy']); // Удалить товар из заказа
});
