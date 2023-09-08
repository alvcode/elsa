<?php

namespace App\Http\Requests\v1\Auth;

use App\Http\Requests\BaseRequest;

class PhoneCallRequest extends BaseRequest
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
            'phone_number' => ['required', 'integer', 'min:100000000', 'max:99999999999999'],
        ];
    }


    protected function prepareForValidation()
    {
        $this->merge([
            'phone_number' => preg_replace('/[^0-9]/iu', '', $this->input('phone_number')),
        ]);
    }
}
