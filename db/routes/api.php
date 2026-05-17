<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', function (Request $request) {

    return response()->json([
        'message' => 'register success',
        'name' => $request->name,
        'email' => $request->email,
    ]);
});