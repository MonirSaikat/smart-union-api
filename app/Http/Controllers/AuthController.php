<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validation->fails()) {
            return response()->json(['errors' => $validation->errors()->all()], 400);
        }

        $email = $request->email;
        $password = $request->password;

        if (auth()->attempt(['email' => $email, 'password' => $password])) {
            $user = auth()->user();

            $token = $user->createToken('MyApp')->accessToken;

            return response()->json(['success' => true, 'user' => auth()->user(), 'token' => $token]);
        } else {
            return response()->json(['success' => false, 'message' => 'Invalid Credentials']);
        }

    }
}
