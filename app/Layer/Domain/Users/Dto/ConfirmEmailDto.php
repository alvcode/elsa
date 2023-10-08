<?php

namespace App\Layer\Domain\Users\Dto;

class ConfirmEmailDto
{
    private string $email;
    private int $validate_email_code;

    public function setEmail(string $email): void 
    {
        $this->email = $email;
    }

    public function setValidateEmailCode(int $code): void 
    {
        $this->validate_email_code = $code;
    }
    

    public function getEmail(): string 
    {
        return $this->email;
    }

    public function getValidateEmailCode(): int 
    {
        return $this->validate_email_code;
    }
}