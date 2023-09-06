<?php

namespace App\Http\Controllers\v1;

use App\Contracts\v1\Auth\ConfirmActionsContract;
use App\Contracts\v1\Auth\RegisterActionsContract;
use App\Http\Requests\v1\Auth\ConfirmEmailRequest;
use App\Http\Requests\v1\Auth\RegisterEmailRequest;
use App\Models\v1\User;
use Illuminate\Support\Facades\Hash;

//use Illuminate\Http\Request;

class AuthController extends Controller
{   
    
    
    /**
    * Регистрация пользователя по электронной почте.
    *
    * @OA\Post(
    *     path="/v1/auth/email/register",
    *     tags={"Auth"},
    *     summary="Регистрация по электронной почте",
    *     @OA\RequestBody(required=true, description="Данные пользователя для регистрации",
    *      @OA\JsonContent(
    *        required={"email", "password"},
    *        @OA\Property(property="email", type="string", format="email", example="user@example.com"),
    *        @OA\Property(property="password", type="string", format="password", example="secretpassword")
    *      )
    *     ),
    *     @OA\Response(response=200, description="Успешная регистрация"),
    *     @OA\Response(response=400, description="Некорректный запрос"),
    *     @OA\Response(response=500, description="Внутренняя ошибка сервера")
    * )
    */
    public function registerByEmail(
        RegisterEmailRequest $request, 
        RegisterActionsContract $registerEmailAction
    ): array
    {
        $validated = $request->validated();

        // $user = User::first();
        // if (Hash::check($validated['password'], $user->password)) {
        //     var_dump('yes'); exit();
        // }else{
        //     var_dump('no'); exit();
        // }

        $registerEmailAction($validated);
        return ['result' => 'ok'];
    }


     /**
    * Подтверждение электронной почты
    *
    * @OA\Post(
    *     path="/v1/auth/email/confirm",
    *     tags={"Auth"},
    *     summary="Подтверждение электронной почты пользователя",
    *     @OA\RequestBody(required=true, description="Данные для подтверждения",
    *      @OA\JsonContent(
    *        required={"email", "code"},
    *        @OA\Property(property="email", type="string", format="email", example="user@example.com"),
    *        @OA\Property(property="code", type="string", format="integer", example="12345")
    *      )
    *     ),
    *     @OA\Response(response=200, description="Успешная регистрация"),
    *     @OA\Response(response=422, description="Неверный код подтверждения"),
    *     @OA\Response(response=500, description="Внутренняя ошибка сервера")
    * )
    */
    public function confirmEmail(
        ConfirmEmailRequest $request,
        ConfirmActionsContract $confirmActionsContract
    )
    {
        $validated = $request->validated();
        $confirmActionsContract($validated);
        return ['result' => 'ok'];
    }
    
}
