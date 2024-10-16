<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function login(Request $request)
    {
        $request->validate($this->user->regras(), $this->user->feedback());

        $user = User::where('name', $request->name)->first();


        if ($user && Hash::check($request->password, $user->password)) {
            $token = $user->createToken('Token')->plainTextToken;

            return response()->json(['token' => $token]);
        }

        return response()->json(['msg' => 'usuário ou senha incorretos'], 401);
    }

    public function logout(Request $request)
    {

        Auth::user()->tokens()->delete();
        return response()->json(['msg' => 'Deslogado']);
    }

    public function usuario(Request $request)
    {
        return response()->json($request->user());
    }
}

