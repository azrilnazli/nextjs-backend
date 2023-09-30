<?php
namespace Modules\User\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Modules\User\Models\User;

class AppController extends BaseController
{
    function token()
    {
        $user = User::find(1); // test user
        $token = $user->createToken('token-name')->plainTextToken;
        return $token;
    }

    function user()
    {
        return response()->json(['message' => 'This is protected resource'], 200);
    }

    public function login(){
        return response()->json(['message' => 'Please login'], 200);
    }

    public function logout(Request $request)
    {
        // delete all tokens in DB
        $request->user()->tokens->each(function ($token, $key) {
            $token->delete();
        });

        return response()->json(['message' => 'Logged out'], 200);
    }
}
