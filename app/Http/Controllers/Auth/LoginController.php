<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {

        $credentailes = ['email' => $request->email, 'password' => $request->password];


        if (!Auth::attempt($credentailes)) {
            return response()->json([
                'message' => 'Bilgiler Hatalı'
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
