<?php

namespace App\Services\AuthCall;

interface AuthCallFactoryInterface 
{
    public function createAuthCall(): AuthCallInterface;
}