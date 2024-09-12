<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthApiController extends Controller
{

    public function create_user(Request $request)
    {

        //"1|RhwL6l69J5LwBC9rVdrEhwwpn4bnM482sepx5kr7"

        $this->validate(
            $request,
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required'
            ]
        );

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'status' => true,
            'message' => 'User Created Successfully',
            'user' => $user,
            'email ' => $user->email,
            // Token is converted to plain text
            'token' => $user->createToken("API-TOKEN")->plainTextToken

        ], 200);
    }
    public function logout(Request $request){
        $user = auth()->user() ;
       $user()->tokens()->delete();
       return
       [
        'message'=>'You have loggoed out',
       ];

    }
}
