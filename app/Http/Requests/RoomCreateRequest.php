<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomCreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'hotel_id' => 'nullable|exists:hotels,id',
            'type' => 'nullable|string',
            'has_bathroom' => 'nullable|boolean',
            'has_breakfast' => 'nullable|boolean',
            'rating' => 'nullable|integer|min:0|max:5',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'price' => 'required|integer|min:0',
        ];
    }
}
