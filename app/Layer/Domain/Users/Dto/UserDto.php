<?php

namespace App\Layer\Domain\Users\Dto;

use DateTimeInterface;

class UserDto 
{
    private ?int $id;
    private int $phone_number;
    private string $email;
    private int $validate_email_code;
    private DateTimeInterface $email_verified_at;
    private DateTimeInterface $created_at;
    private DateTimeInterface $updated_at;

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setPhoneNumber(int $number): void 
    {
        $this->phone_number = $number;
    }

    public function setEmail(string $email): void 
    {
        $this->email = $email;
    }

    public function setValidateEmailCode(int $code): void 
    {
        $this->validate_email_code = $code;
    }

    public function setEmailVerifiedAt(DateTimeInterface $dateTime): void 
    {
        $this->email_verified_at = $dateTime;
    }

    public function setCreatedAt(DateTimeInterface $dateTime): void 
    {
        $this->created_at = $dateTime;
    }

    public function setUpdatedAt(DateTimeInterface $dateTime): void 
    {
        $this->updated_at = $dateTime;
    }


    public function getId(): int
    {
        return $this->id;
    }

    public function getPhoneNumber(): int 
    {
        return $this->phone_number;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getValidateEmailCode(): int 
    {
        return $this->validate_email_code;
    }

    public function getEmailVerifiedAt(): DateTimeInterface 
    {
        return $this->email_verified_at;
    }

    public function getCreatedAt(): DateTimeInterface 
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): DateTimeInterface 
    {
        return $this->updated_at;
    }
}