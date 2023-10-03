<?php
namespace Modules\User\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;

class AppController extends BaseController
{
    function token()
    {
        $user = User::find(1); // test user
        $token = $user->createToken('token-name')->plainTextToken;
        return response()->json(['token' => $token]);
    }

    function user()
    {
        return response()->json(['message' => 'This is protected resource 123'], 200);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) { // if login is success
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;
            // return success 200 with token
            return response()->json(['message' => 'Login successful', 'token' => $token], 200);
        }

        // return unauthorized 401
        return response()->json(['message' => 'Invalid credentials'], 401);
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
