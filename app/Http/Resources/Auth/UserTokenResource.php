<?php

namespace App\Http\Resources\Auth;

use App\Components\Formatter;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserTokenResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'token' => $this->token,
            'refresh_token' => $this->refresh_token,
            'expired_to' => Formatter::unixTimeUTCToDateTime($this->expired_to)
        ];
    }
}
