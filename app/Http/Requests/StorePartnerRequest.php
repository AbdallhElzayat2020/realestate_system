<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePartnerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'logo' => ['required', 'image', 'max:2048'],
            'status' => ['required', 'in:active,inactive'],
            'link' => ['nullable', 'string', 'url', 'max:500'],
            'order' => ['nullable', 'integer', 'min:0'],
        ];
    }
}
