<?php

namespace App\Layer\Persistence\Entity\Users;


class UserPersistence 
{
    private ?int $id = null;
    private ?int $phone_number = null;
    private ?string $email = null;
    private int $validate_email_code;
    private ?string $email_verified_at = null;
    private string $created_at;
    private string $updated_at;

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setPhoneNumber(?int $number): void 
    {
        $this->phone_number = $number;
    }

    public function setEmail(?string $email): void 
    {
        $this->email = $email;
    }

    public function setValidateEmailCode(int $code): void 
    {
        $this->validate_email_code = $code;
    }

    public function setEmailVerifiedAt(?string $dateTime): void 
    {
        $this->email_verified_at = $dateTime;
    }

    public function setCreatedAt(string $dateTime): void 
    {
        $this->created_at = $dateTime;
    }

    public function setUpdatedAt(string $dateTime): void 
    {
        $this->updated_at = $dateTime;
    }


    public function getId(): int
    {
        return $this->id;
    }

    public function getPhoneNumber(): ?int
    {
        return $this->phone_number;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getValidateEmailCode(): int 
    {
        return $this->validate_email_code;
    }

    public function getEmailVerifiedAt(): ?string
    {
        return $this->email_verified_at;
    }

    public function getCreatedAt(): string 
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): string 
    {
        return $this->updated_at;
    }
}