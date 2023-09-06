<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class UnprocessableHttpException extends UnprocessableEntityHttpException
{
    public function __construct(string $message = '', \Throwable $previous = null, int $code = 0, array $headers = [])
    {
        parent::__construct($message, $previous, $code, $headers);
    }

    public function render()
    {
        return response()->json(
            [
                'code' => $this->getCode(), 'message' => $this->getMessage()
            ],
            $this->getStatusCode()
        );
    }
}