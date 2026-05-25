<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', function (Request $request) {

    $user = User::create([
        'name' => $request->name,
        'gender' => $request->gender,
        'height' => $request->height,
        'current_weight' => $request->current_weight,
        'target_weight' => $request->target_weight,
    ]);

    return response()->json([
        'success' => true,
        'message' => 'register success',
        'user_id' => $user->id,
    ]);
});