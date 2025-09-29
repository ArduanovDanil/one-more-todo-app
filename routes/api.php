<?php

use App\Http\Controllers\Api\v1\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {
    Route::get('/user', function (Request $request) {
        return '$request->user()';
    })
    //->middleware('auth:sanctum')
    ;
    Route::post('/tasks', [TaskController::class, 'store']);

    Route::get('/task/{id}', [TaskController::class, 'show']);



});