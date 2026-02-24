<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestimonialRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name.en' => ['required', 'string', 'max:255'],
            'name.ar' => ['required', 'string', 'max:255'],
            'role.en' => ['nullable', 'string', 'max:120'],
            'role.ar' => ['nullable', 'string', 'max:120'],
            'content.en' => ['required', 'string', 'max:2000'],
            'content.ar' => ['required', 'string', 'max:2000'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
            'status' => ['required', 'in:active,inactive'],
            'order' => ['nullable', 'integer', 'min:0'],
        ];
    }
}
