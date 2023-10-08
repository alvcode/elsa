<?php

namespace App\Http\Controllers\v1;

use App\Contracts\v1\Auth\ConfirmActionsContract;
use App\Contracts\v1\Auth\ForgotActionsContract;
use App\Contracts\v1\Auth\LoginActionsContract;
use App\Contracts\v1\Auth\LoginPhoneActionsContract;
use App\Contracts\v1\Auth\PhoneCallActionsContract;
use App\Contracts\v1\Auth\RefreshActionsContract;
use App\Contracts\v1\Auth\RegisterActionsContract;
use App\Contracts\v1\Auth\ResetActionsContract;
use App\Contracts\v1\Auth\SendConfirmActionsContract;
use App\Http\Requests\v1\Auth\ConfirmEmailRequest;
use App\Http\Requests\v1\Auth\ForgotEmailRequest;
use App\Http\Requests\v1\Auth\LoginEmailRequest;
use App\Http\Requests\v1\Auth\LoginPhoneRequest;
use App\Http\Requests\v1\Auth\PhoneCallRequest;
use App\Http\Requests\v1\Auth\RefreshTokenRequest;
use App\Http\Requests\v1\Auth\RegisterEmailRequest;
use App\Http\Requests\v1\Auth\ResetPasswordRequest;
use App\Http\Requests\v1\Auth\SendConfirmEmailRequest;
use App\Http\Resources\v1\Auth\UserTokenResource;
use App\Http\Validators\v1\Auth\DeviceIdHeaderValidator;
use App\Layer\Domain\Users\Dto\ConfirmEmailDto;
use App\Layer\Domain\Users\Dto\CreateUserByEmailDto;
use App\Layer\UseCases\Users\ConfirmEmailUseCase;
use App\Layer\UseCases\Users\CreateUserByEmailUseCase;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{   

    private CreateUserByEmailUseCase $createUserByEmailUseCase;
    private ConfirmEmailUseCase $confirmEmailUseCase;

    public function __construct(
        CreateUserByEmailUseCase $createUserByEmailUseCase,
        ConfirmEmailUseCase $confirmEmailUseCase
    )
    {
        $this->createUserByEmailUseCase = $createUserByEmailUseCase;
        $this->confirmEmailUseCase = $confirmEmailUseCase;
    }


    public function registerByEmail(
        RegisterEmailRequest $request
    ): array
    {
        $validated = $request->validated();

        $createUserByEmailDto = new CreateUserByEmailDto();
        $createUserByEmailDto->setEmail($validated['email']);
        $createUserByEmailDto->setPassword($validated['password']);

        $this->createUserByEmailUseCase->action($createUserByEmailDto);

        return ['result' => 'ok'];
    }


    public function confirmEmail(
        ConfirmEmailRequest $request,
    )
    {
        $validated = $request->validated();
        $confirmEmailDto = new ConfirmEmailDto();
        $confirmEmailDto->setEmail($validated['email']);
        $confirmEmailDto->setValidateEmailCode($validated['code']);

        $this->confirmEmailUseCase->action($confirmEmailDto);

        return ['result' => 'ok'];
    }


 
    public function loginEmail(
        LoginEmailRequest $request,
        LoginActionsContract $loginActionsContract
    )
    {
        $validated = $request->validated();
        $validateDeviceId = new DeviceIdHeaderValidator(['Device-Id' => $request->header('Device-Id')]);
        $validateDeviceId = $validateDeviceId->validate();

        $userToken = $loginActionsContract($validated, $validateDeviceId['Device-Id']);
        return new UserTokenResource($userToken);
    }


    public function refreshToken(
        RefreshTokenRequest $request,
        RefreshActionsContract $refreshActionsContract
    )
    {
        $validated = $request->validated();
        $validateDeviceId = new DeviceIdHeaderValidator(['Device-Id' => $request->header('Device-Id')]);
        $validateDeviceId = $validateDeviceId->validate();
        
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


    public function resetPassword(
        ResetPasswordRequest $request,
        ResetActionsContract $resetActionsContract
    )
    {
        $validated = $request->validated();
        $resetActionsContract($validated);
        return ['result' => 'ok'];
    }


    public function repeatConfirmEmailCode(
        SendConfirmEmailRequest $request,
        SendConfirmActionsContract $sendConfirmActionsContract
    )
    {
        $validated = $request->validated();
        $sendConfirmActionsContract($validated);
        return ['result' => 'ok'];
    }


    public function phoneCall(
        PhoneCallRequest $request,
        PhoneCallActionsContract $phoneCallActionsContract
    )
    {
        $validated = $request->validated();
        $phoneCallActionsContract($validated);
        return ['result' => 'ok'];
    }


    public function phoneLogin(
        LoginPhoneRequest $request,
        LoginPhoneActionsContract $loginPhoneActionsContract
    )
    {
        $validated = $request->validated();
        $validateDeviceId = new DeviceIdHeaderValidator(['Device-Id' => $request->header('Device-Id')]);
        $validateDeviceId = $validateDeviceId->validate();

        $userToken = $loginPhoneActionsContract($validated, $validateDeviceId['Device-Id']);
        return new UserTokenResource($userToken);
    }
    
}
