<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Auth\UserApiResource;

class UserAuthController extends Controller
{

    /**
     * @group Auth User
     *
     * Register a user
     *
     */
    public function register(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $token = $user->createToken($user->name . '-AuthToken')->plainTextToken;
        $user['token'] = $token;

        return response()->json(UserApiResource::make($user), 201);
    }

    /**
     * @group Auth User
     *
     * login
     *
     */
    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid Credentials'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken($user->name . '-AuthToken')->plainTextToken;
        $user['token'] = $token;


        return response()->json(UserApiResource::make($user));
    }

    /**
     * @group Auth User
     *
     * logout and destory token
     *

     * @authenticated
     */
    public function logout(Request $request): JsonResponse
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }

    /**
     * @group Auth User
     *
     * get user infomation
     *

     * @authenticated
     */
    public function detail(Request $request): JsonResponse
    {
        return response()->json(UserApiResource::make($request->user()));
    }
}
