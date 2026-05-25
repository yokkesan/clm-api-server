<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'height' => $request->height,
            'current_weight' => $request->current_weight,
            'target_weight' => $request->target_weight,
        ]);

        return response()->json([
            'success' => true,
            'message' => '登録成功',
            'user_id' => $user->id
        ]);
    }
}