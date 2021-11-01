<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        if(Auth::attempt($request->validated())){
            $user = Auth::user();
            return (new UserResource($user))->additional(['token'=>$user->createToken('AleshaCard963')->plainTextToken])->response()->setStatusCode(JsonResponse::HTTP_OK);
        }
        return new JsonResponse([
            'message' => "Username or password doesn't match"
        ], JsonResponse::HTTP_UNAUTHORIZED);
    }
}
