<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'status' => ['required', 'in:active,inactive'],
            'name.en' => ['required', 'string', 'max:255'],
            'name.ar' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:services,slug'],
            'description.en' => ['nullable', 'string'],
            'description.ar' => ['nullable', 'string'],
            'thumbnail' => ['nullable', 'image', 'max:2048'],
            'banner' => ['nullable', 'image', 'max:2048'],
        ];
    }
}
