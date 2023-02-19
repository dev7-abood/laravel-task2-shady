<?php

namespace App\Http\Requests\ApiV1;

use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required',
            'website' => 'url',
            'phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'unique:companies,email',
        ];
    }
}
