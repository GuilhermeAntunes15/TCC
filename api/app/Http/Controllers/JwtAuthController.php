<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;


class JwtAuthController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth:api', ['except' => ['login', 'register']]);
    // }

    /**
     * Get a JWT via given credentials.
     */
    public function login(Request $request)
    {
        $user = $request->usuario;
        $pass = $request->senha;

        $credentials = array(
            'US_LOGIN' => $user,
            'password' => $pass
        );

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    // /**
    //  * Sign up.
    //  *
    //  * @return \Illuminate\Http\JsonResponse
    //  */
    // public function register(Request $request)
    // {
    //     $req = Validator::make($request->all(), [
    //         'name' => 'required|string|between:2,100',
    //         'email' => 'required|string|email|max:100|unique:users',
    //         'password' => 'required|string|confirmed|min:6',
    //     ]);

    //     if ($req->fails()) {
    //         return response()->json($req->errors()->toJson(), 400);
    //     }

    //     $user = User::create(array_merge(
    //         $req->validated(),
    //         ['password' => bcrypt($request->password)]
    //     ));

    //     return response()->json([
    //         'message' => 'User signed up',
    //         'user' => $user
    //     ], 201);
    // }


    /**
     * Sign out
     */
    public function signout()
    {
        Auth::signout();
        return response()->json(['message' => 'User loged out']);
    }

    public function me()
    {
        $user = JWTAuth::user();

        return response()->json(compact('user'));
    }

    /**
     * Token refresh
     */
    public function refresh()
    {
        return $this->generateToken(Auth::refresh());
    }

    /**
     * User
     */
    public function user()
    {
        return response()->json(auth()->user());
    }

    /**
     * Generate token
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60
        ]);
    }
}
