<?php

namespace App\Exceptions;

use Illuminate\Validation\ValidationException;

class MyValidateException extends ValidationException
{
    public function __construct($validator, $response = null, $errorBag = 'default')
    {
        parent::__construct($validator, $response, $errorBag);
    }

    public function render()
    {
        return response()->json(
            [
                'code' => $this->getCode(), 'message' => $this->getMessage()
            ],
            $this->status
        );
    }
}