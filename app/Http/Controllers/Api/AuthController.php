<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginUserRequest;
use App\Models\User;
use App\Traits\ApiResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiResponses;
    //

    /**
     * @unauthenticated
     * @param LoginUserRequest $loginUserRequest
     * @return JsonResponse
     */
    public function login(LoginUserRequest $loginUserRequest) {
        //attempt auth
        if(!Auth::attempt($loginUserRequest->only('email', 'password'))) {
            return $this->error('Invalid Email or Password', 401);
        }

        $user = User::firstWhere('email', $loginUserRequest->email);
        return $this->ok(
            'Authenticated',
            [
                'token' => $user->createToken('API Token')->plainTextToken,
            ]
        );
    }

    /**
     * @param Request $request
     * @authenticated
     * @return JsonResponse
     */
    public function register(Request $request) {
        return $this->ok('you are at login endpoint');
    }

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();

        return $this->ok('logout');
    }
}
