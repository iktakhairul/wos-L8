<?php

namespace App\Http\Controllers\Api;

use App\Constants\Media;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Services\FileService;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{

    private $userService;
    private $fileService;

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct(UserService $userService,FileService $fileService)
    {
        $this->userService = $userService;
        $this->fileService = $fileService;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Auth\RegisterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function registration(RegisterRequest $request)
    {
        DB::beginTransaction();
        try {
            //make new user
            $user = $this->userService->addUser($request);
            $this->fileService->addImage($user,'image',Media::USER_PROFILE_IMAGE);
            DB::commit();
            //return successful response
            return (new UserResource($user))->response()->setStatusCode(JsonResponse::HTTP_CREATED);
        } catch (\Exception $exception) {
            DB::rollBack();
            error_log($exception->getMessage());
            return new JsonResponse(['message' =>'User Registration Failed!'], JsonResponse::HTTP_CONFLICT);
        }
    }

}
