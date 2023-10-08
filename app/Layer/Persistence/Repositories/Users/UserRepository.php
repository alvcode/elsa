<?php

namespace App\Layer\Persistence\Repositories\Users;

use App\Layer\Domain\Users\Repositories\UserRepositoryInterface;
use App\Layer\Persistence\Entity\Users\CreateUserByEmailPersistence;
use App\Layer\Persistence\Entity\Users\UserPersistence;
use App\Models\v1\User;

class UserRepository implements UserRepositoryInterface
{
    public function insertByEmail(CreateUserByEmailPersistence $userPersistence): void 
    {
        User::query()->create(
            [
                'email' => $userPersistence->getEmail(),
                'password' => $userPersistence->getPassword(),
                'validate_email_code' => $userPersistence->getValidateEmailCode()
            ]
        );
    }


    public function getUserByEmail(string $email): UserPersistence 
    {
        $user = User::query()->where('email', $email)->first()->toArray();
        return $this->toPersistence($user);
    }
    

    public function updateUser(UserPersistence $userPersistence): UserPersistence
    {
        $user = User::query()->where('id', $userPersistence->getId())->firstOrFail();
        $user->phone_number = $userPersistence->getPhoneNumber();
        $user->email = $userPersistence->getEmail();
        $user->validate_email_code = $userPersistence->getValidateEmailCode();
        $user->email_verified_at = $userPersistence->getEmailVerifiedAt();
        $user->created_at = $userPersistence->getCreatedAt();
        $user->updated_at = $userPersistence->getUpdatedAt();

        $user->save();
        return $this->toPersistence($user->toArray());
    }


    public function getUserById(UserPersistence $userPersistence): UserPersistence
    {
        $user = User::query()->where('id', $userPersistence->getId())->first()->toArray();
        return $this->toPersistence($user);
    }


    private function toPersistence(array $data): UserPersistence
    {
        $userPersistence = new UserPersistence();
        if($data['id']){
            $userPersistence->setId($data['id']);
        }
        if($data['phone_number']){
            $userPersistence->setPhoneNumber($data['phone_number']);
        }
        if($data['email']){
            $userPersistence->setEmail($data['email']);
        }
        if($data['validate_email_code']){
            $userPersistence->setValidateEmailCode($data['validate_email_code']);
        }
        if($data['email_verified_at']){
            $userPersistence->setEmailVerifiedAt($data['email_verified_at']);
        }
        if($data['created_at']){
            $userPersistence->setCreatedAt($data['created_at']);
        }
        if($data['updated_at']){
            $userPersistence->setUpdatedAt($data['updated_at']);
        }
        return $userPersistence;
    }
}