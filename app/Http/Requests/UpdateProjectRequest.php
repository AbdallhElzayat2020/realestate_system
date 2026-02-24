<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'status' => ['required', 'in:active,inactive'],
            'project_state' => ['nullable', 'string', 'in:under_construction,completed,planned'],
            'service_id' => ['nullable', 'exists:services,id'],
            'name.en' => ['required', 'string', 'max:255'],
            'name.ar' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('projects', 'slug')->ignore($this->route('project'))],
            'description.en' => ['nullable', 'string'],
            'description.ar' => ['nullable', 'string'],
            'tags' => ['nullable', 'string', 'max:500'],
            'map' => ['nullable', 'string', 'max:2000'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
            'banner' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:5120'],
            'main_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:5120'],
            'images' => ['nullable', 'array'],
            'images.*' => ['image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:5120'],
        ];
    }
}
