<?php

namespace App\Layer\Domain\Users;

use App\Layer\Domain\Users\Entity\CreateUserByEmailEntity;

interface SaveUserByEmailInterface
{
    public function __construct();

    public function save(CreateUserByEmailEntity $userEntity): void;
}