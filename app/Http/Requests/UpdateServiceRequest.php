<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $serviceId = $this->route('service')?->id ?? null;
        return [
            'status' => ['required', 'in:active,inactive'],
            'name.en' => ['required', 'string', 'max:255'],
            'name.ar' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('services', 'slug')->ignore($serviceId)],
            'description.en' => ['nullable', 'string'],
            'description.ar' => ['nullable', 'string'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
            'banner' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
        ];
    }
}
