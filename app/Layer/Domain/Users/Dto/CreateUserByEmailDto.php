<?php

namespace App\Layer\Domain\Users\Dto;

class CreateUserByEmailDto
{
    private string $email;
    private string $password;
    private int $validate_email_code;

    public function setEmail(string $email): void 
    {
        $this->email = $email;
    }

    public function setPassword(string $password): void 
    {
        $this->password = $password;
    }

    public function setValidateEmailCode(int $code): void 
    {
        $this->validate_email_code = $code;
    }
    

    public function getEmail(): string 
    {
        return $this->email;
    }

    public function getPassword(): string 
    {
        return $this->password;
    }

    public function getValidateEmailCode(): int 
    {
        return $this->validate_email_code;
    }
}