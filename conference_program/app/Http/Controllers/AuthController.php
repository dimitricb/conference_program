<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
//use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken('myappToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(User $user)
    {
        auth()->user()->tokens()->delete();
        // auth()->user()->where::tokens()->delete();
        //DB::table('oauth_access_tokens')->where('user_id', $user->id)->delete();

        return [
            'message' => 'logged out,token destroyed'
        ];
    }

    public function login(Request $request)
    {

        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        //check email
        $user = User::where('email', $fields['email'])->first();

        //check password

        if (!$user || !Hash::check($fields['password'], $user->password)) {

            return response([

                'message' => 'Bad creds'

            ], 401);
        }


        $token = $user->createToken('myappToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }
}
