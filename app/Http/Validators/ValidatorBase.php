<?php

namespace App\Http\Validators;

use Illuminate\Support\Facades\Validator;

class ValidatorBase
{
    protected array $rules = [];
    private array $data = [];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    
    public static function make(array $data): self
    {
        return new static($data);
    }


    public function validate()
    {
        return Validator::make($this->data, $this->rules)->validate();
    }
}