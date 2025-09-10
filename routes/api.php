<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register', [\App\Http\Controllers\AuthenticationController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\AuthenticationController::class, 'login']);

Route::get('/user', function (Request $request) {
//    $request->user()->currentAccessToken()->delete();
    return new \App\Http\Resources\UserResource($request->user());
})->middleware('auth:sanctum');

Route::get('/users', function (Request $request) {
    return \App\Http\Resources\UserResource::collection(User::all());
});
