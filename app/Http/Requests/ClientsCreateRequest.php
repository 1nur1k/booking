<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientsCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'firstName' => 'required', 'string', 'max:255',
            'lastName' => 'required', 'string', 'max:255',
            'birth_date' => 'required', 'date',
            'passport_number' => 'required', 'string', 'max:10',
            'passport_series' => 'required', 'string', 'max:2',
            'phone_number' => 'required', 'string', 'max:10',

        ];
    }
}
