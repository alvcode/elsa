<?php

namespace App\Http\Validators\v1\Auth;

use App\Http\Validators\ValidatorBase;

class DeviceIdHeaderValidator extends ValidatorBase
{
    protected array $rules = [
        'Device-Id' => ['required', 'string', 'max:15']
    ];

    public function __construct(array $data)
    {
        parent::__construct($data);
    }
}