<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'gender' => 'required|in:男性,女性',
            'height' => 'required|numeric|min:100|max:250',
            'current_weight' => 'required|numeric|min:20|max:300',
            'target_weight' => 'required|numeric|min:20|max:300',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'バリデーションエラー',
                'errors' => $validator->errors()
            ], 422);
        }

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
        ], 200);
    }
}