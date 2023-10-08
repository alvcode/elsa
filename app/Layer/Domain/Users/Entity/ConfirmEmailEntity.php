<?php

namespace App\Layer\Domain\Users\Entity;

class ConfirmEmailEntity
{
    private string $email;
    private int $validate_email_code;

    public function __construct(
        string $email,
        int $validate_email_code
    )
    {
        $this->email = $email;
        $this->validate_email_code = $validate_email_code;
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