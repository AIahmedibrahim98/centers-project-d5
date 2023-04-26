<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);
            if ($user = User::firstWhere('email', $request->email)) {
                if (Hash::check($request->password, $user->password)) {
                    $user->update(['api_token'=>Str::random(64)]);
                    auth()->login($user);
                    return response()->json(['message' => 'User login','user'=>$user]);
                } else {
                    return response()->json(['message' => 'User Not Found'], 403);
                }
            } else {
                return response()->json(['message' => 'User Not Found'], 403);
            }
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
}
