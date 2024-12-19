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
            'hotel_id' => 'required|exists:hotels,id',
            'type' => 'required|string',
            'bath' => 'required|boolean',
            'breakfast' => 'required|boolean',
            'rating' => 'nullable|numeric|min:0|max:10',
            'status' => 'required|string|in:доступен,забронирован',
            'price' => 'required|integer|min:0',
        ];
    }
}
