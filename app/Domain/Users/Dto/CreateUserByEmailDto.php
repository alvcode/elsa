<?php

namespace App\Domain\Users\Dto;

class CreateUserByEmailDto
{
    public function __construct(
        public readonly string $email,
        public readonly string $password,
    ) {}

    public function getEmail(): string 
    {
        return $this->email;
    }

    public function getPassword(): string 
    {
        return $this->password;
    }
}