<?php

namespace App\Http\Requests\v1\Auth;

use App\Http\Requests\BaseRequest;

class ConfirmEmailRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email', 'max:150'],
            'code' => ['required', 'integer']
        ];
    }
}
