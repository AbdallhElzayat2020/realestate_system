<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'status' => ['required', 'in:active,inactive'],
            'show_on_home' => ['nullable', 'boolean'],
            'title.en' => ['required', 'string', 'max:255'],
            'title.ar' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:blogs,slug'],
            'content.en' => ['nullable', 'string'],
            'content.ar' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:2048'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'show_on_home' => $this->boolean('show_on_home'),
        ]);
    }
}
