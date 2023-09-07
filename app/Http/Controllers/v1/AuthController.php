<?php

namespace App\Http\Controllers\v1;

use App\Contracts\v1\Auth\ConfirmActionsContract;
use App\Contracts\v1\Auth\ForgotActionsContract;
use App\Contracts\v1\Auth\LoginActionsContract;
use App\Contracts\v1\Auth\RefreshActionsContract;
use App\Contracts\v1\Auth\RegisterActionsContract;
use App\Http\Requests\v1\Auth\ConfirmEmailRequest;
use App\Http\Requests\v1\Auth\ForgotEmailRequest;
use App\Http\Requests\v1\Auth\LoginEmailRequest;
use App\Http\Requests\v1\Auth\RefreshTokenRequest;
use App\Http\Requests\v1\Auth\RegisterEmailRequest;
use App\Http\Resources\Auth\UserTokenResource;
use App\Models\v1\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

//use Illuminate\Http\Request;

class AuthController extends Controller
{   
    
    
    public function registerByEmail(
        RegisterEmailRequest $request, 
        RegisterActionsContract $registerEmailAction
    ): array
    {
        $validated = $request->validated();
        $registerEmailAction($validated);
        return ['result' => 'ok'];
    }


   
    public function confirmEmail(
        ConfirmEmailRequest $request,
        ConfirmActionsContract $confirmActionsContract
    )
    {
        $validated = $request->validated();
        $confirmActionsContract($validated);
        return ['result' => 'ok'];
    }


 
    public function loginEmail(
        LoginEmailRequest $request,
        LoginActionsContract $loginActionsContract
    )
    {
        $validated = $request->validated();
        $validateDeviceId = Validator::make(['Device-Id' => $request->header('Device-Id')], [
            'Device-Id' => ['required', 'string', 'max:15']
        ])->validate();

        $userToken = $loginActionsContract($validated, $validateDeviceId['Device-Id']);
        return new UserTokenResource($userToken);
    }


    public function refreshToken(
        RefreshTokenRequest $request,
        RefreshActionsContract $refreshActionsContract
    )
    {
        $validated = $request->validated();
        $validateDeviceId = Validator::make(['Device-Id' => $request->header('Device-Id')], [
            'Device-Id' => ['required', 'string', 'max:15']
        ])->validate();
        
        $userToken = $refreshActionsContract($validated, $validateDeviceId['Device-Id']);
        return new UserTokenResource($userToken);
    }


    public function forgotEmail(
        ForgotEmailRequest $request,
        ForgotActionsContract $forgotActionContract
    )
    {
        $validated = $request->validated();
        $forgotActionContract($validated['email']);

        return ['result' => 'ok'];
    }
    
}
