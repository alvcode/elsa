<?php

namespace App\Layer\Domain\Users;

use App\Layer\Domain\Users\Dto\ConfirmEmailDto;
use App\Layer\Domain\Users\Entity\ConfirmEmailEntity;

class ConfirmEmailBuilder
{
    public function make(ConfirmEmailDto $createUserByEmailDto): ConfirmEmailEntity
    {
        return new ConfirmEmailEntity(
            $createUserByEmailDto->getEmail(),
            $createUserByEmailDto->getValidateEmailCode()
        );
    }
}