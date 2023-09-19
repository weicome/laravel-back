<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\Back\Auth\LoginRequest;
use App\Http\Resources\Back\AdminUserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Jiannei\Response\Laravel\Support\Facades\Response;

class AuthController extends Controller
{

    public function authenticate(LoginRequest $request): JsonResponse|JsonResource
    {
        $credentials = array_merge($request->validated(),['status'=>1]);
        $remember = $request->request->get('remember',false);
        if(Auth::guard('admin')->attempt($credentials, $remember)){
            $request->session()->regenerate();
            $permission = Auth::guard('admin')->user()->permissions();
            $token = $request->user('admin')
                ->createToken($request->request->get('account'),$permission);
            return Response::success([
                'type' => 'Bearer',
                'token'=>$token->plainTextToken,
                'expires_at' => config('sanctum.expiration'),
            ]);
        }
        return Response::fail('账号或密码不正确');
    }

    public function logout(Request $request): JsonResponse|JsonResource
    {
        Auth::guard('admin')->logout();
        $request->session()->regenerateToken();
        $request->user('admin')->currentAccessToken()->delete();

        return Response::ok();
    }

    public function myInfo(Request $request): JsonResponse|JsonResource
    {
        $user = $request->user('admin');
        return Response::success(new AdminUserResource($user));
    }
}
