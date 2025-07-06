<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\UserController;

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');
    if (!Auth::attempt($credentials)) {
        return response()->json(['message' => 'Unauthorized'], 401);
    }

    $user = Auth::user();
    $token = $user->createToken('api-token')->plainTextToken;

    return response()->json(['token' => $token]);
});

// ✅ Route tanpa auth
Route::get('/users', [UserController::class, 'index']);

// ✅ Route dengan auth:sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users/{user}', [UserController::class, 'show']);
    Route::post('/users', [UserController::class, 'store']);
    Route::put('/users/{user}', [UserController::class, 'update']);
    Route::delete('/users/{user}', [UserController::class, 'destroy']);
});