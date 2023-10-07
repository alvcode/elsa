<?php

namespace App\Layer\Persistence\Entity\Users;

class CreateUserByEmailPersistence
{
    private string $email;
    private string $password;
    private int $validate_email_code;

    public function __construct(
        string $email,
        string $password,
        int $validate_email_code
    )
    {
        $this->email = $email;
        $this->password = $password;
        $this->validate_email_code = $validate_email_code;
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