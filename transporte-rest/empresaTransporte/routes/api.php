<?php

use App\Http\Controllers\LoginControler;
use App\Http\Controllers\SalidasController;
use App\Http\Middleware\JwtMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::apiResource("/salidas",SalidasController::class)->middleware(JwtMiddleware::class);
Route::post("/login", [LoginControler::class, 'login']);