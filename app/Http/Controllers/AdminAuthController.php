<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as Responses;

class AdminAuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $token = Auth::user()->createToken('TokenName')->accessToken;

            return response()->json(['token' => $token, 'user' => $user ],
            Responses::HTTP_OK);
        } else {
            return response()->json(['message' => 'Email or Password doesn`t match record'],
            Responses::HTTP_UNAUTHORIZED);
        }
    }
}