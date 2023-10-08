<?php

namespace App\Layer\UseCases\Users;

use App\Exceptions\UnprocessableHttpException;
use App\Layer\Domain\Users\Actions\GetUserByEmailActionInterface;
use App\Layer\Domain\Users\Actions\UpdateUserActionInterface;
use App\Layer\Domain\Users\ConfirmEmailBuilder;
use App\Layer\Domain\Users\Dto\ConfirmEmailDto;
use Carbon\Carbon;

class ConfirmEmailUseCase
{
    private ConfirmEmailBuilder $confirmEmailBuilder;
    private GetUserByEmailActionInterface $getUserByEmailAction;
    private UpdateUserActionInterface $updateUserAction;

    public function __construct(
        ConfirmEmailBuilder $confirmEmailBuilder, 
        GetUserByEmailActionInterface $getUserByEmailAction,
        UpdateUserActionInterface $updateUserAction
    )
    {
        $this->confirmEmailBuilder = $confirmEmailBuilder;
        $this->getUserByEmailAction = $getUserByEmailAction;
        $this->updateUserAction = $updateUserAction;
    }

    public function action(ConfirmEmailDto $confirmEmailDto)
    {
        $confirmEmailEntity = $this->confirmEmailBuilder->make($confirmEmailDto);
        $userEntity = $this->getUserByEmailAction->action($confirmEmailEntity->getEmail());

        if(!$userEntity->getId()){
            throw new UnprocessableHttpException(__('auth.user_not_found'));
        }

        if($userEntity->getValidateEmailCode() !== $confirmEmailDto->getValidateEmailCode()){
            throw new UnprocessableHttpException(__('auth.invalid_code'));
        }
        $carbon = Carbon::now();
        $userEntity->setEmailVerifiedAt($carbon->format('Y-m-d H:i:s'));

        $this->updateUserAction->action($userEntity);

        return $userEntity;
    }
}