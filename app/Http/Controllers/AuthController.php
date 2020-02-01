<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /*
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // public function login()
    // {
    //     $credentials = $request->only('username', 'password');
    //     if (!($token = JWTAuth::attempt($credentials))) {
    //         return response()->json([
    //             'status' => 'error',
    //             'error' => 'invalid.credentials',
    //             'msg' => 'Invalid Credentials.',
    //         ], Response::HTTP_BAD_REQUEST);
    //     }

    //     return response()->json(['token' => $token], Response::HTTP_OK);
    // }

    // public function user(Request $request)
    // {
    //     $user = Auth::guard('taikhoan')::user();

    //     if ($user) {
    //         return response($user, Response::HTTP_OK);
    //     }

    //     return response(null, Response::HTTP_BAD_REQUEST);
    // }

    /*
     * Log out
     * Invalidate the token, so user cannot use it anymore
     * They have to relogin to get a new token.
     *
     * @param Request $request
     */
    // public function logout(Request $request)
    // {
    //     $this->validate($request, ['token' => 'required']);

    //     try {
    //         JWTAuth::invalidate($request->input('token'));

    //         return response()->json('You have successfully logged out.', Response::HTTP_OK);
    //     } catch (JWTException $e) {
    //         return response()->json('Failed to logout, please try again.', Response::HTTP_BAD_REQUEST);
    //     }
    // }

    // public function refresh()
    // {
    //     return response(JWTAuth::getToken(), Response::HTTP_OK);
    // }
}
