<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if (!auth()->attempt(['email'=>$request->email, 'password'=>$request->password])) {
            return response()->json(['error' => 'email atau password tidak sesuai'], 401);
        }

        $token = auth()->user()->createToken('personal_token', expiresAt:now()->addDay())->plainTextToken;

        return response()->json(['token' => $token], 200);
    }

    public function register(StoreUserRequest $request)
    {
        $validated = $request->validated();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);

        return response()->json(['user' => $user], 200);
    }
}
