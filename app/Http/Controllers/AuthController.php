<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Input yang dimasukkan tidak sesuai.'],
            ]);
        }

        if ($user->role == 'admin') {
            $token = $user->createToken('token',['role:admin'], expiresAt:now()->addDay())->plainTextToken;
        } else {
            $token = $user->createToken('token',['role:user'], expiresAt:now()->addDay())->plainTextToken;
        }

        return response()->json(['token' => $token], 200);
    }

    public function register(StoreUserRequest $request)
    {
        $validatedData = $request->validated();

        $user = User::create($validatedData);

        return response()->json(['user' => $user], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully'], 200);
    }
}
