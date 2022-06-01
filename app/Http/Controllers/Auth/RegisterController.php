<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Auth;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {



        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $credentailes = ['email' => $request->email, 'password' => $request->password];


        if (!Auth::attempt($credentailes)) {
            return response()->json([
                'message' => 'Giriş Yapılamadı'
            ], 401);
        }

        $user = $request->user();

        $tokenResult = $user->createToken('Personal Access');
        $token = $tokenResult->token;
        $token->save();

        return response()->json([
            'success' => true,
            'user' => $user,
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
        ], 201);
    }
}
