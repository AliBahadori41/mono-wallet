<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\UsePromotionRequest;
use App\Http\Requests\Api\User\LoginRequest;
use App\Models\PromotionCode;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Login request
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $this->responsed(['token' => $user->createToken('web-app')->plainTextToken], true);
    }

    /**
     * Use the promotion code to incorrect user wallet.
     *
     * @param UsePromotionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function usePromotion(UsePromotionRequest $request)
    {
        $code = PromotionCode::where('code', $request->code)->first();

        $request->user()->wallet->setBalance($code->amount);

        return $this->responsed([], true);
    }
}
