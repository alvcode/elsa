<?php

namespace App\Services\AuthCall;

use App\Exceptions\UnprocessableHttpException;
use Illuminate\Support\Facades\Http;

class SmsRuCallService implements AuthCallInterface
{
    private string $apiKey;
    private int $phoneNumber;

    private string $code;


    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }


    public function setNumber(int $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }


    public function call(): bool
    {
        $response = Http::withQueryParameters([
            'phone' => $this->phoneNumber,
            'api_id' => $this->apiKey
        ])->get('https://sms.ru/code/call');

        $response = $response->json();

        if($response["status"] !== 'OK'){
            throw new UnprocessableHttpException(__('auth.call_error') .': ' .$response['status_text']);
        }

        $this->code = $response['code'];
        return true;
    }


    public function getCode(): string 
    {
        return $this->code;
    }
}