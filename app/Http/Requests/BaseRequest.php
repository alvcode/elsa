<?php

namespace App\Http\Requests;

use App\Exceptions\MyValidateException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
{
    //use ValidatesRequests;

    protected function failedValidation(Validator $validator){
        throw (new MyValidateException($validator))
                    ->errorBag($this->errorBag)
                    ->redirectTo($this->getRedirectUrl());
    }
}
