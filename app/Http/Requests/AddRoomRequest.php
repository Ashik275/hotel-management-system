<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AddRoomRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'room_title' => 'required|string|max:255|unique:rooms,room_title',
            'room_description' => 'required|string',
            'room_price' => 'required|numeric|min:0',
            'room_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'room_type' => 'required|in:regular,preamium,deluxe',
            'free_wifi' => 'required|in:yes,no',
        ];
    }

    public function messages(): array
    {
        return [
            'room_title.required' => 'Room title is required.',
            'room_title.unique' => 'This room title already exists. Please choose another title.',
            'room_description.required' => 'Room description is required.',
            'room_price.required' => 'Room price is required.',
            'room_price.numeric' => 'Room price must be a number.',
            'room_image.required' => 'Room image is required.',
            'room_image.image' => 'Please upload a valid image.',
            'room_image.max' => 'Image size cannot exceed 2MB.',
            'room_type.required' => 'Please select room type.',
            'free_wifi.required' => 'Please select free wifi option.',
        ];
    }
}
