<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return '$request->user()';
})->withRouting(apiPrefix: 'api/admin')
//->middleware('auth:sanctum')
;


